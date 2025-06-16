import sys
from pdf2image import convert_from_path
import os

pdf_path = sys.argv[1]
output_dir = sys.argv[2]
images = convert_from_path(pdf_path)
for i, img in enumerate(images):
    img_path = os.path.join(output_dir, f'page_{i+1}.jpg')
    img.save(img_path, 'JPEG')
print("done")
