import random
from essential_generators import DocumentGenerator
from faker import Faker

fake = Faker()
gen = DocumentGenerator()

for i in range(4):
    print(end = "(\'")
    print(gen.sentence(), end='\', ')
    print("TO_TIMESTAMP('",end='')
    print(fake.date_between(start_date='-2y', end_date = '+2y'),end='\',')
    print(" 'YYYY-MM-DD')", end=', ')
    print("TO_TIMESTAMP('",end='')
    print(fake.date_between(start_date='+2y', end_date = '+3y'),end='\',')
    print(" 'YYYY-MM-DD')", end=',')
    print()