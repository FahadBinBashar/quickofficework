<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;
use Illuminate\Support\Facades\Storage;

class PDFController extends Controller
{
    public function showMergeForm() {
        return view('pdf.merge');
    }

    public function mergePDF(Request $request) {
        $request->validate([
            'pdfs.*' => 'required|file|mimes:pdf',
        ]);

        $mergedPdfPath = storage_path('app/public/merged.pdf');
        $pdf = new Fpdi();

        foreach ($request->file('pdfs') as $file) {
            $pageCount = $pdf->setSourceFile($file->getPathname());

            for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
                $tplId = $pdf->importPage($pageNo);
                $size = $pdf->getTemplateSize($tplId);
                $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
                $pdf->useTemplate($tplId);
            }
        }

        $pdf->Output($mergedPdfPath, 'F');
        return response()->download($mergedPdfPath)->deleteFileAfterSend(true);
    }
    //split
    public function showSplitForm()
    {
        return view('pdf.split');
    }

    public function splitPDF(Request $request)
    {
        $request->validate([
            'pdf' => 'required|file|mimes:pdf',
            'from_page' => 'required|integer|min:1',
            'to_page' => 'required|integer|min:1',
        ]);

        $pdf = new Fpdi();
        $file = $request->file('pdf');
        $path = $file->getPathname();
        $pageCount = $pdf->setSourceFile($path);

        $from = $request->input('from_page');
        $to = $request->input('to_page');

        if ($from > $to || $to > $pageCount) {
            return back()->with('error', 'Invalid page range.');
        }

        for ($i = $from; $i <= $to; $i++) {
            $tpl = $pdf->importPage($i);
            $size = $pdf->getTemplateSize($tpl);
            $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
            $pdf->useTemplate($tpl);
        }

        $outputPath = storage_path('app/public/split_' . time() . '.pdf');
        $pdf->Output($outputPath, 'F');

        return response()->download($outputPath)->deleteFileAfterSend(true);
    }

    //compress

    public function showCompressForm()
    {
        return view('pdf.compress');
    }

    public function compressPDF(Request $request)
    {
        $request->validate([
            'pdf' => 'required|file|mimes:pdf',
        ]);

        $original = $request->file('pdf')->getPathname();
        $compressed = storage_path('app/public/compressed_' . time() . '.pdf');

        $gsCommand = "gs -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dPDFSETTINGS=/ebook ".
                    "-dNOPAUSE -dQUIET -dBATCH -sOutputFile=\"$compressed\" \"$original\"";

        $output = null;
        $resultCode = null;
        exec($gsCommand, $output, $resultCode);

        if ($resultCode !== 0) {
            return back()->with('error', 'Compression failed.');
        }

        return response()->download($compressed)->deleteFileAfterSend(true);
    }

}
