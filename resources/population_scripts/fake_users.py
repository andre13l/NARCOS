import secrets
import random
import string
from essential_generators import DocumentGenerator
from faker import Faker

fake = Faker()
gen = DocumentGenerator()

for i in range(15):
    print(end = "(\'")
    print(fake.profile(fields = ['username'])['username'], end='\', \'')
    print(fake.profile(fields = ['mail'])['mail'], end='\', ')
    print("TO_TIMESTAMP('",end='')
    print(fake.profile(fields = ['birthdate'])['birthdate'],end='\', ')
    print("'YYYY-MM-DD')", end=', ')
    print(bool(random.getrandbits(1)), end=', \'')
    print(secrets.token_hex(16), end='\', \'')
    print("https://imgur.com/", end='')
    print(''.join(random.choice(string.ascii_letters) for i in range(6)), end = '')
    print('.jpg', end='\', ')
    print(bool(random.getrandbits(1)), end=', ')
    print(random.randrange(-100,1000), end = '),')
    print()