<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;

class PDFController extends Controller
{
    public function showMergeForm() {
        return view('pdf.merge');
    }

    public function mergePDF(Request $request) {
        // ...merge logic here
    }

    public function showSplitForm() {
        return view('pdf.split');
    }

    public function splitPDF(Request $request) {
        // ...split logic here
    }

    public function showCompressForm() {
        return view('pdf.compress');
    }

    public function compressPDF(Request $request) {
        // ...compress logic using Ghostscript
    }

    public function showPdfToImageForm() {
        return view('pdf.pdf_to_image');
    }

    public function convertPdfToImage(Request $request) {
        // ...call Python script for pdf2image
    }

    public function showImageToPdfForm() {
        return view('pdf.image_to_pdf');
    }

    public function convertImageToPdf(Request $request) {
        // ...call Python script for image to pdf
    }
}
