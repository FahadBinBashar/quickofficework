import sys
from PIL import Image
import os

image_paths = sys.argv[1:-1]
output_pdf = sys.argv[-1]

images = [Image.open(p).convert('RGB') for p in image_paths]
images[0].save(output_pdf, save_all=True, append_images=images[1:])
print("done")
