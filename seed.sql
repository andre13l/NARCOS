SET search_path TO lbaw22131;

INSERT INTO authenticated_user (username, email, date_of_birth, is_admin, password, avatar, is_suspended, reputation)
VALUES
    ('wilsonedgar', 'angelawarren@gmail.com', TO_TIMESTAMP('1941-01-20', 'YYYY-MM-DD'), True, '9bd8fc89d6aa8b6cc5a412af2e9b98f4', 'https://imgur.com/KEdjFB.jpg', False, 516),
    ('aliciagiles', 'gonzalezjose@hotmail.com', TO_TIMESTAMP('1961-12-17', 'YYYY-MM-DD'), True, '4a2ae0b1f2167355b2528711b156982b', 'https://imgur.com/DPbexm.jpg', False, 631),
    ('youngthomas', 'cynthia64@hotmail.com', TO_TIMESTAMP('1967-07-18', 'YYYY-MM-DD'), False, 'f997b0f751f8bf4008536c6a5870efd1', 'https://imgur.com/qrPvja.jpg', False, 826),
    ('collinstanya', 'prestonhuff@hotmail.com', TO_TIMESTAMP('1944-06-09', 'YYYY-MM-DD'), False, '847d913369818e9da39e5783a89c2f53', 'https://imgur.com/fkrSjs.jpg', False, 715),
    ('mccallbrian', 'anthonyross@gmail.com', TO_TIMESTAMP('1912-05-18', 'YYYY-MM-DD'), True, '6566d27d344f200a5c554f0632ebbacf', 'https://imgur.com/bKlnAm.jpg', False, 26),
    ('gwhite', 'mhaney@hotmail.com', TO_TIMESTAMP('1955-10-19', 'YYYY-MM-DD'), False, '469c6b97a601ccbee7981e3a0f63ead2', 'https://imgur.com/AqficW.jpg', True, -99),
    ('rodriguezjoseph', 'michaelschultz@hotmail.com', TO_TIMESTAMP('1973-05-01', 'YYYY-MM-DD'), False, 'b317367df06f75fc70de2a441750d92a', 'https://imgur.com/ReyJZG.jpg', False, 420),
    ('rosesamuel', 'mwilliamson@gmail.com', TO_TIMESTAMP('1956-05-10', 'YYYY-MM-DD'), False, 'f5a21f5ba9e4769e5bb65300a871efec', 'https://imgur.com/Vpyjrg.jpg', False, 678),
    ('derrick06', 'mrivera@hotmail.com', TO_TIMESTAMP('2005-02-23', 'YYYY-MM-DD'), False, '42593cdba1ea4ae98fd28ce7c09eba75', 'https://imgur.com/QTpDyv.jpg', False, 859),
    ('cassandracalderon', 'bondkristen@yahoo.com', TO_TIMESTAMP('1972-12-27', 'YYYY-MM-DD'), False, 'c5f195a014d9a382bfac4fa35b0cabfd', 'https://imgur.com/UcnRYF.jpg', False, 136),
    ('igiles', 'samuel05@gmail.com', TO_TIMESTAMP('1958-12-31', 'YYYY-MM-DD'), False, '619962a6eda46825878e5b77272e86a7', 'https://imgur.com/AxHvGB.jpg', True, 347),
    ('anthonykim', 'hlee@gmail.com', TO_TIMESTAMP('1996-04-25', 'YYYY-MM-DD'), False, 'f6f9d833e471f5bfe3f9a5d4f5da4fec', 'https://imgur.com/WCfJfY.jpg', False, 319),
    ('johnwaters', 'jamesbarron@yahoo.com', TO_TIMESTAMP('1921-08-23', 'YYYY-MM-DD'), False, '33391a9226ddc34cc7c9ecf4dc6a5b46', 'https://imgur.com/WLpgIB.jpg', True, -54),
    ('danielle24', 'qfoster@gmail.com', TO_TIMESTAMP('1950-07-10', 'YYYY-MM-DD'), False, '932cc9fc81b3a678a09100e150cd94dd', 'https://imgur.com/gJfvRo.jpg', True, 202),
    ('ideleon', 'amandawilliams@gmail.com', TO_TIMESTAMP('1955-11-24', 'YYYY-MM-DD'), False, 'e711eaba7e42d052f123c1b9b0609a51', 'https://imgur.com/EsUaUw.jpg', False, 782);

INSERT INTO suspension (reason, start_time, end_time, admin_id, user_id)
VALUES
    ('nsfw profile pic and comments', TO_TIMESTAMP('2022-03-23', 'YYYY-MM-DD'), TO_TIMESTAMP('2025-10-19', 'YYYY-MM-DD'), 1,6),
    ('Threatening another user', TO_TIMESTAMP('2023-03-23', 'YYYY-MM-DD'), TO_TIMESTAMP('2025-08-07', 'YYYY-MM-DD'),5,11),
    ('Threatening another user', TO_TIMESTAMP('2022-02-09', 'YYYY-MM-DD'), TO_TIMESTAMP('2025-01-18', 'YYYY-MM-DD'),1,13),
    ('Hate speech', TO_TIMESTAMP('2022-10-11', 'YYYY-MM-DD'), TO_TIMESTAMP('2025-01-23', 'YYYY-MM-DD'),2,14);

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
    (6,2);

INSERT INTO post (body, published_date, is_edited, likes, dislikes, author_id)
VALUEs
    ('When referring Center on', TO_TIMESTAMP('1977-08-31', 'YYYY-MM-DD'), False, 54, 75, 1),
    ('Become attached or étages. These physical types, in', TO_TIMESTAMP('1954-06-07', 'YYYY-MM-DD'), False, 12, 2, 3),
    ('Simple compounds, Christian Andersen (1805–1875), the philosophical works of Jābir ibn Hayyān (721–815 CE), al-Battani', TO_TIMESTAMP('1947-11-24', 'YYYY-MM-DD'), False, 51, 16, 2),
    ('And substorms, by GovPubs at the same time, some organizations now use the CFP franc', TO_TIMESTAMP('1983-11-28', 'YYYY-MM-DD'), False, 72, 76, 6),
    ('Of conception. Sea, Tasman Sea, and Mediterranean', TO_TIMESTAMP('1945-03-22', 'YYYY-MM-DD'), False, 34, 70, 11),
    ('(the Internet body temperature', TO_TIMESTAMP('1987-08-26', 'YYYY-MM-DD'), False, 13, 40, 13),
    ('Crossed from or low-pressure', TO_TIMESTAMP('2014-11-18', 'YYYY-MM-DD'), False, 61, 5, 9),
    ('(corn and Montana, which has eleven judges appointed by the crown and the', TO_TIMESTAMP('1938-12-02', 'YYYY-MM-DD'), False, 9, 31, 13);

INSERT INTO article (post_id, title, thumbnail) 
VALUES
    (1, 'Boasted a strong tongue (containing similar touch receptors to', 'https://imgur.com/gJglZK.jpg'),
    (2, 'Threaten Egypts main systems of considerable Amerindian ancestry form the Downtown Loop, runs 2.7 miles', 'https://imgur.com/uvIeAn.jpg'),
    (3, 'One "fair" secure Virtual', 'https://imgur.com/HJaWqL.jpg'),
    (4, 'Prediction must tasks, but on', 'https://imgur.com/djlhDb.jpg');

INSERT INTO feedback (user_id, post_id, is_like)
VALUES
    (1,2,True),
    (2,5,False),
    (6,1,True),
    (7,3, True),
    (14, 4, False);

INSERT INTO article_topic(article_id, topic_id)
VALUES
    (1,3),
    (2,2),
    (3,7),
    (4,8);