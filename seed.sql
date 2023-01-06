SET search_path TO lbaw22131;

INSERT INTO authenticated_user (username, email, date_of_birth, is_admin, password, avatar, is_suspended, reputation)
VALUES
    ('wilsonedgar', 'angelawarren@gmail.com', TO_TIMESTAMP('1941-01-20', 'YYYY-MM-DD'), False, '9bd8fc89d6aa8b6cc5a412af2e9b98f4', null, False, 516),
    ('aliciagiles', 'gonzalezjose@hotmail.com', TO_TIMESTAMP('1961-12-17', 'YYYY-MM-DD'), False, '4a2ae0b1f2167355b2528711b156982b', null, False, 631),
    ('youngthomas', 'cynthia64@hotmail.com', TO_TIMESTAMP('1967-07-18', 'YYYY-MM-DD'), False, 'f997b0f751f8bf4008536c6a5870efd1', null, False, 826),
    ('collinstanya', 'prestonhuff@hotmail.com', TO_TIMESTAMP('1944-06-09', 'YYYY-MM-DD'), False, '847d913369818e9da39e5783a89c2f53', null, False, 715),
    ('mccallbrian', 'anthonyross@gmail.com', TO_TIMESTAMP('1912-05-18', 'YYYY-MM-DD'), False, '6566d27d344f200a5c554f0632ebbacf', null, False, 26),
    ('gwhite', 'mhaney@hotmail.com', TO_TIMESTAMP('1955-10-19', 'YYYY-MM-DD'), False, '469c6b97a601ccbee7981e3a0f63ead2', null, False, -99),
    ('rodriguezjoseph', 'michaelschultz@hotmail.com', TO_TIMESTAMP('1973-05-01', 'YYYY-MM-DD'), False, 'b317367df06f75fc70de2a441750d92a', null, False, 420),
    ('rosesamuel', 'mwilliamson@gmail.com', TO_TIMESTAMP('1956-05-10', 'YYYY-MM-DD'), False, 'f5a21f5ba9e4769e5bb65300a871efec', null, False, 678),
    ('derrick06', 'mrivera@hotmail.com', TO_TIMESTAMP('2005-02-23', 'YYYY-MM-DD'), False, '42593cdba1ea4ae98fd28ce7c09eba75', null, False, 859),
    ('cassandracalderon', 'bondkristen@yahoo.com', TO_TIMESTAMP('1972-12-27', 'YYYY-MM-DD'), False, 'c5f195a014d9a382bfac4fa35b0cabfd', null, False, 136),
    ('igiles', 'samuel05@gmail.com', TO_TIMESTAMP('1958-12-31', 'YYYY-MM-DD'), False, '619962a6eda46825878e5b77272e86a7', null, False, 347),
    ('anthonykim', 'hlee@gmail.com', TO_TIMESTAMP('1996-04-25', 'YYYY-MM-DD'), False, 'f6f9d833e471f5bfe3f9a5d4f5da4fec', null, False, 319),
    ('johnwaters', 'jamesbarron@yahoo.com', TO_TIMESTAMP('1921-08-23', 'YYYY-MM-DD'), False, '33391a9226ddc34cc7c9ecf4dc6a5b46', null, False, -54),
    ('danielle24', 'qfoster@gmail.com', TO_TIMESTAMP('1950-07-10', 'YYYY-MM-DD'), False, '932cc9fc81b3a678a09100e150cd94dd', null, False, 202),
    ('ideleon', 'amandawilliams@gmail.com', TO_TIMESTAMP('1955-11-24', 'YYYY-MM-DD'), False, 'e711eaba7e42d052f123c1b9b0609a51', null, False, 782);

/* create admin user and suspended user*/
INSERT INTO authenticated_user (username, email, date_of_birth, is_admin, password, avatar, is_suspended, reputation)
VALUES
  ('admin1', 'admin1@lbaw.com', TO_TIMESTAMP('1998-12-03', 'YYYY-MM-DD'), True, '$2a$12$L1ZZNfOm63yL5kYDYOVv7OUbHodZSAJjgW9b9Z6/GiB4anaR.FLM6', null, False, 666),
  ('admin2', 'admin2@lbaw.com', TO_TIMESTAMP('1998-12-04', 'YYYY-MM-DD'), True, '$2a$12$L1ZZNfOm63yL5kYDYOVv7OUbHodZSAJjgW9b9Z6/GiB4anaR.FLM6', null, False, 999),
  ('suspended1', 'suspended1@lbaw.com', TO_TIMESTAMP('1998-01-01', 'YYYY-MM-DD'), False, '$2a$12$L1ZZNfOm63yL5kYDYOVv7OUbHodZSAJjgW9b9Z6/GiB4anaR.FLM6', null, True, -666),
  ('suspended2', 'suspended2@lbaw.com', TO_TIMESTAMP('1998-02-02', 'YYYY-MM-DD'), False, '$2a$12$L1ZZNfOm63yL5kYDYOVv7OUbHodZSAJjgW9b9Z6/GiB4anaR.FLM6', null, True, -999),
  ('npc', 'npc@lbaw.com', TO_TIMESTAMP('1997-02-02', 'YYYY-MM-DD'), False, '$2a$12$L1ZZNfOm63yL5kYDYOVv7OUbHodZSAJjgW9b9Z6/GiB4anaR.FLM6', null, False, 404);

INSERT INTO suspension (reason, start_time, end_time, admin_id, user_id)
VALUES
    ('nsfw profile pic and comments', TO_TIMESTAMP('2022-03-23', 'YYYY-MM-DD'), TO_TIMESTAMP('2025-10-19', 'YYYY-MM-DD'), 16,19),
    ('Threatening another user', TO_TIMESTAMP('2023-03-23', 'YYYY-MM-DD'), TO_TIMESTAMP('2025-08-07', 'YYYY-MM-DD'),17,18);

INSERT INTO report (reason, reported_at, is_closed, reported_id, reporter_id)
VALUES
    ('Toxic person', TO_TIMESTAMP('2021-04-21', 'YYYY-MM-DD'), True, 4,3),
    ('Disrespectful towards my culture', TO_TIMESTAMP('2021-08-11', 'YYYY-MM-DD'), True, 13,8),
    ('Promoting another website', TO_TIMESTAMP('2022-09-11', 'YYYY-MM-DD'), True, 8,10),
    ('Offensive profile picture', TO_TIMESTAMP('2021-12-26', 'YYYY-MM-DD'), True, 6,3),
    ('Hate attitude on comment section', TO_TIMESTAMP('2020-10-30', 'YYYY-MM-DD'), True, 14,4),
    ('He told me he would find me and kill me', TO_TIMESTAMP('2021-10-19', 'YYYY-MM-DD'), True, 11,12),
    ('NSFW profile picture and comments', TO_TIMESTAMP('2021-08-19', 'YYYY-MM-DD'), True, 6,12),
    ('I dont like this person', TO_TIMESTAMP('2021-07-19', 'YYYY-MM-DD'), True, 15,8),
    ('Kick her out of this website please', TO_TIMESTAMP('2021-11-30', 'YYYY-MM-DD'), False, 3,4),
    ('Told me to oof myself', TO_TIMESTAMP('2021-01-24', 'YYYY-MM-DD'), True, 13,4);

INSERT INTO topic (subject, topic_date, status, user_id)
VALUES
    ('Sports', TO_TIMESTAMP('2021-10-03', 'YYYY-MM-DD'), 'ACCEPTED',1),
    ('Movies', TO_TIMESTAMP('2022-07-01', 'YYYY-MM-DD'), 'ACCEPTED',2),
    ('Anime', TO_TIMESTAMP('2021-01-20', 'YYYY-MM-DD'), 'ACCEPTED',3),
    ('Crime', TO_TIMESTAMP('2020-12-31', 'YYYY-MM-DD'), 'REJECTED',4),
    ('Health', TO_TIMESTAMP('2022-04-09', 'YYYY-MM-DD'), 'ACCEPTED',5),
    ('Science', TO_TIMESTAMP('2022-07-01', 'YYYY-MM-DD'), 'ACCEPTED',6),
    ('Fights', TO_TIMESTAMP('2022-08-05', 'YYYY-MM-DD'), 'ACCEPTED',7),
    ('Religion', TO_TIMESTAMP('2022-06-26', 'YYYY-MM-DD'), 'ACCEPTED',8),
    ('Law', TO_TIMESTAMP('2021-02-24', 'YYYY-MM-DD'), 'ACCEPTED',9),
    ('Games', TO_TIMESTAMP('2021-10-01', 'YYYY-MM-DD'), 'PENDING',10);

INSERT INTO follow (follower_id, followed_id)
VALUES
    (1,2),
    (2,1),
    (3,4),
    (4,5),
    (2,3),
    (3,1),
    (14,12),
    (15,11),
    (8,9),
    (9,1),
    (6,2),
    (1,16),
    (2,16),
    (3,16),
    (4,16),
    (5,17),
    (6,17),
    (7,17),
    (8,17);

INSERT INTO post (body, published_date, is_edited, likes, dislikes, author_id)
VALUEs
    ('This match had been billed as Kylian Mbappé vs. Messi  the 23-year-old French star ready to assume the mantle of the worlds greatest player from his 35-year-old Paris Saint-Germain teammate.', TO_TIMESTAMP('2022-12-18', 'YYYY-MM-DD'), False, 54, 75, 1),
    ('Fall and winter are associated with a higher incidence of upper respiratory infections, such as the common cold and flu, due to the increased transmission of respiratory viruses.
    Although cooler temperatures and low humidity are associated with increased susceptibility to respiratory viruses, the biological mechanisms underlying this relationship are not understood.
    A recent study showed that cold temperatures lead to a decline in the immune response elicited by cells in the nasal cavity to viruses, which explains why people are more susceptible to upper respiratory infections in colder temperatures.', TO_TIMESTAMP('2022-10-10', 'YYYY-MM-DD'), False, 12, 2, 3),
    ('The way of water connects all things. The sea is our home before our birth and after we die.” Beyond the 3D visual spectacle that Avatar is, something we trust James Cameron to deliver, the franchises beauty lies in its underlying spiritual arc and ode to continuity of life. Life finds a way. It evolves no matter the surroundings as love is transformative.
    Humans call the Navi hostiles and insurgents, when it is they who forcefully infiltrate and occupy their land. Despite its magical, fictional setting, Avatar is not devoid of socio-political themes. It addresses race, civilisation, takes a strong anti-military stand and makes a plea for environment conservation through its simple story of parents and children. A spectacular climax revolves around parents protecting their children and vice versa.
    From lush jungles to the gorgeous reefs… the action shifts from forests to the sea this time around and its equally meditative and hypnotic. For over three hours you find yourself immersed in the enchanting world of an oceanic clan (Metkayina) or the reef people who give Sully and his family a refuge from humans. The sequel scores high on action and emotion. One is not compromised for the other. Happiness is simple. The Sullys stay together. This is our biggest weakness and our greatest strength,” says Jake Sully and the story embodies that spirit. The tale isnt unique per se but the storytelling and visual excellence are otherworldly epic. Mounted on a massive scale, not once do you find yourself wanting to return to the real world
    While the predecessor set the bar high for visual effects 13 years ago, the new film takes it a step further. Like the previous film, the director does not use 3D as a gimmick but uses it artfully to accentuate audience immersion in the world and story. Avatar: The Way of Water deserves be watched in IMAX 3D. It is the greatest immersive cinema experience of the year — world building at its finest.', TO_TIMESTAMP('2022-10-04', 'YYYY-MM-DD'), False, 51, 16, 2),
    ('If you think religion belongs to the past and we live in a new age of reason, you need to check out the facts: 84% of the worlds population identifies with a religious group. Members of this demographic are generally younger and produce more children than those who have no religious affiliation, so the world is getting more religious, not less  although there are significant geographical variations.', TO_TIMESTAMP('2018-08-27', 'YYYY-MM-DD'), False, 72, 76, 6),
    ('Of conception. Sea, Tasman Sea, and Mediterranean', TO_TIMESTAMP('1945-03-22', 'YYYY-MM-DD'), False, 34, 70, 11),
    ('(the Internet body temperature', TO_TIMESTAMP('1987-08-26', 'YYYY-MM-DD'), False, 13, 40, 13),
    ('Crossed from or low-pressure', TO_TIMESTAMP('2014-11-18', 'YYYY-MM-DD'), False, 61, 5, 9),
    ('(corn and Montana, which has eleven judges appointed by the crown and the', TO_TIMESTAMP('1938-12-02', 'YYYY-MM-DD'), False, 9, 31, 13);

INSERT INTO article (post_id, title, thumbnail) 
VALUES
    (1, 'The clashing of two stars', null),
    (2, 'Why do we always seem to catch a cold or flu in cold weather? A new study explains', null),
    (3, 'Avatar: The Way Of Water Movie Review : A worthy sequel', null),
    (4, 'Religion: why faith is becoming more and more popular', null);

INSERT INTO feedback (user_id, post_id, is_like)
VALUES
    (1,2,True),
    (2,5,False),
    (6,1,True),
    (7,3, True),
    (14, 4, False);

INSERT INTO article_topic(article_id, topic_id)
VALUES
    (1,1),
    (2,5),
    (3,2),
    (4,8);

INSERT INTO topic_follow(user_id, topic_id)
VALUES
  (1,1),
  (1,2),
  (17,1);