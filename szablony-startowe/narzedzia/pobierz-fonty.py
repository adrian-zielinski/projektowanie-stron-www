import urllib.request
import json
import os

url = 'https://gwfh.mranftl.com/api/fonts/inter?subsets=latin,latin-ext'
response = urllib.request.urlopen(url)
data = json.loads(response.read())

variants = data['variants']
weights = ['400', '600', '700']

os.makedirs('szablony-startowe/logistiq/assets/fonts/inter', exist_ok=True)

for v in variants:
    if v['fontWeight'] in weights and v['fontStyle'] == 'normal':
        woff2_url = v['woff2']
        filename = f"inter-{v['fontWeight']}.woff2"
        filepath = os.path.join('szablony-startowe/logistiq/assets/fonts/inter', filename)
        print(f"Downloading {woff2_url} to {filepath}")
        urllib.request.urlretrieve(woff2_url, filepath)

print("Done")
