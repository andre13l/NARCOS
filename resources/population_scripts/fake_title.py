import secrets
import random
import string
from essential_generators import DocumentGenerator
from faker import Faker

fake = Faker()
gen = DocumentGenerator()

for i in range(8):
    print(end= '(')
    print(i + 1, end= ', \'')
    print(gen.sentence(), end = '\', \'')
    print("https://imgur.com/", end='')
    print(''.join(random.choice(string.ascii_letters) for i in range(6)), end = '')
    print('.jpg', end='\'),')
    print()
