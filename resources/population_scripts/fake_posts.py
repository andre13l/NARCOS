import secrets
import random
import string
from essential_generators import DocumentGenerator
from faker import Faker

fake = Faker()
gen = DocumentGenerator()

for i in range(8):
    print(end = "(\'")
    print(gen.sentence(), end = '\', ')
    print("TO_TIMESTAMP('",end='')
    print(fake.profile(fields = ['birthdate'])['birthdate'],end='\', ')
    print("'YYYY-MM-DD')", end=', ')
    print(False, end=', ')
    print(random.randrange(0,100), end = ', ')
    print(random.randrange(0,100), end = ', ')
    print(end = ')')
    print()