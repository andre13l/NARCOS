import random
from faker import Faker

fake = Faker()

for i in range(10):
    print(end = "(\'")
    print(end='\', ')
    print("TO_TIMESTAMP('",end='')
    print(fake.date_between(start_date='-2y', end_date = 'now'),end='\',')
    print(" 'YYYY-MM-DD')", end=', ')
    print(bool(random.getrandbits(1)), end=', ')
    print(end = '\' \',')
    print(end = '\' \'),')
    print()