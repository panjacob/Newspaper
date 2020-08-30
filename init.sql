CREATE TABLE author(
    id serial PRIMARY KEY,
    first varchar(255),
    last varchar(255)
);

CREATE TABLE article(
    id serial PRIMARY KEY,
    title varchar(255),
    text TEXT,
    creation_time     DATETIME DEFAULT CURRENT_TIMESTAMP,
    modification_time DATETIME ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE author_article(
    author_id BIGINT UNSIGNED NOT NULL,
    article_id BIGINT UNSIGNED NOT NULL,
    FOREIGN KEY (author_id) REFERENCES author(id),
    FOREIGN KEY (article_id) REFERENCES article(id)
);

insert into author (first, last) values ('Algernon', 'Haslock');
insert into author (first, last) values ('Willey', 'Shelp');
insert into author (first, last) values ('Cristionna', 'Rouch');
insert into author (first, last) values ('Maxim', 'Dunton');
insert into author (first, last) values ('Hercules', 'Ingold');
insert into author (first, last) values ('Bond', 'Marre');
insert into author (first, last) values ('Adler', 'Esterbrook');
insert into author (first, last) values ('Inge', 'Vaneev');
insert into author (first, last) values ('Osbourne', 'Veasey');
insert into author (first, last) values ('Leisha', 'Gubbins');
insert into author (first, last) values ('Katine', 'Witcherley');
insert into author (first, last) values ('Ivy', 'Feitosa');
insert into author (first, last) values ('Frannie', 'Vickerstaff');
insert into author (first, last) values ('Jori', 'Rapelli');
insert into author (first, last) values ('Alika', 'Cranch');
insert into author (first, last) values ('Jessalyn', 'Lanfranconi');
insert into author (first, last) values ('Rowena', 'Cleere');
insert into author (first, last) values ('Benjamen', 'Ferrara');
insert into author (first, last) values ('Lou', 'Mathiasen');
insert into author (first, last) values ('Nessie', 'Spirit');

insert into article (title, text) values ('lacinia sapien quis libero', 'consectetuer adipiscing elit proin risus praesent lectus vestibulum quam sapien varius ut blandit non interdum in ante vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae duis faucibus accumsan odio curabitur convallis duis consequat dui nec nisi volutpat eleifend donec ut dolor morbi vel lectus in quam fringilla rhoncus mauris enim leo rhoncus sed vestibulum sit amet cursus id turpis integer aliquet massa id lobortis convallis tortor risus dapibus augue vel accumsan tellus nisi eu orci mauris lacinia sapien quis libero nullam sit amet turpis elementum ligula vehicula consequat morbi a ipsum integer');
insert into article (title, text) values ('nullam orci pede', 'in sapien iaculis congue vivamus metus arcu adipiscing molestie hendrerit at vulputate vitae nisl aenean lectus pellentesque eget nunc donec quis orci eget');
insert into article (title, text) values ('fringilla rhoncus mauris', 'aliquam non mauris morbi non lectus aliquam sit amet diam in magna bibendum imperdiet nullam orci pede venenatis non sodales sed tincidunt eu felis fusce posuere felis sed lacus morbi sem mauris laoreet ut rhoncus aliquet pulvinar sed nisl nunc rhoncus dui vel sem sed sagittis nam congue risus semper porta volutpat quam pede lobortis ligula sit amet eleifend pede libero quis orci nullam molestie nibh in lectus pellentesque at nulla suspendisse potenti');
insert into article (title, text) values ('dignissim vestibulum', 'morbi vestibulum velit id pretium iaculis diam erat fermentum justo nec condimentum neque sapien placerat ante nulla justo aliquam quis turpis eget elit sodales scelerisque mauris sit amet eros suspendisse accumsan tortor quis turpis sed ante vivamus');
insert into article (title, text) values ('venenatis turpis enim', 'vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae donec pharetra magna vestibulum aliquet ultrices erat tortor sollicitudin mi');
insert into article (title, text) values ('habitasse platea dictumst maecenas', 'mauris lacinia sapien quis libero nullam sit amet turpis elementum ligula vehicula consequat morbi a ipsum integer a nibh in quis justo maecenas rhoncus aliquam lacus morbi quis tortor id nulla ultrices aliquet maecenas leo odio condimentum id luctus nec molestie sed justo pellentesque viverra pede ac diam cras pellentesque volutpat dui maecenas tristique est et tempus semper est quam pharetra magna ac consequat metus sapien ut nunc vestibulum');
insert into article (title, text) values ('etiam vel', 'curae duis faucibus accumsan odio curabitur convallis duis consequat dui nec nisi volutpat eleifend donec ut dolor morbi vel lectus in quam fringilla rhoncus mauris enim leo rhoncus sed vestibulum sit amet cursus id turpis integer aliquet massa id lobortis convallis tortor risus dapibus augue vel');
insert into article (title, text) values ('elementum in', 'in purus eu magna vulputate luctus cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus vivamus vestibulum sagittis sapien cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus etiam vel');
insert into article (title, text) values ('donec pharetra magna', 'turpis sed ante vivamus tortor duis mattis egestas metus aenean fermentum donec ut mauris eget massa tempor convallis nulla neque libero convallis eget eleifend luctus ultricies eu nibh quisque id justo sit amet sapien dignissim vestibulum vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae nulla dapibus dolor vel est donec odio justo sollicitudin ut suscipit a feugiat et eros vestibulum ac');
insert into article (title, text) values ('vel dapibus at diam', 'in porttitor pede justo eu massa donec dapibus duis at velit eu est congue elementum in hac habitasse platea dictumst morbi vestibulum velit id pretium iaculis diam erat fermentum justo nec condimentum neque sapien placerat ante nulla justo aliquam quis turpis eget elit sodales scelerisque mauris sit amet eros suspendisse accumsan tortor quis turpis sed ante vivamus tortor duis mattis egestas metus aenean fermentum donec ut mauris eget massa tempor');
insert into article (title, text) values ('vel sem', 'fusce congue diam id ornare imperdiet sapien urna pretium nisl ut volutpat sapien arcu sed augue aliquam erat volutpat in congue etiam justo etiam pretium iaculis justo in hac habitasse platea dictumst etiam faucibus cursus urna ut tellus nulla ut erat id mauris vulputate elementum nullam varius nulla facilisi cras non velit nec nisi vulputate nonummy maecenas tincidunt lacus at velit vivamus vel nulla eget eros elementum pellentesque quisque porta volutpat erat quisque erat eros viverra eget congue eget semper rutrum nulla nunc purus phasellus in felis donec semper sapien a libero nam dui proin leo odio');
insert into article (title, text) values ('feugiat', 'phasellus sit amet erat nulla tempus vivamus in felis eu sapien cursus vestibulum proin eu mi nulla ac enim in tempor turpis nec euismod scelerisque quam turpis adipiscing lorem vitae mattis nibh ligula nec sem duis aliquam convallis nunc proin at turpis a pede posuere nonummy integer non velit donec diam neque vestibulum eget vulputate ut ultrices vel augue vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae donec pharetra magna vestibulum aliquet ultrices erat tortor sollicitudin mi sit amet lobortis sapien sapien');
insert into article (title, text) values ('vestibulum', 'etiam pretium iaculis justo in hac habitasse platea dictumst etiam faucibus cursus urna ut tellus nulla ut erat id mauris vulputate elementum nullam varius');
insert into article (title, text) values ('pulvinar lobortis', 'ligula vehicula consequat morbi a ipsum integer a nibh in quis justo maecenas rhoncus aliquam lacus morbi quis tortor id nulla ultrices aliquet maecenas leo odio condimentum id luctus nec molestie sed justo pellentesque viverra pede ac diam cras pellentesque volutpat dui maecenas tristique est et tempus semper est quam pharetra magna ac consequat metus sapien ut nunc vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae mauris viverra diam vitae quam suspendisse potenti nullam porttitor');
insert into article (title, text) values ('eu', 'posuere cubilia curae donec pharetra magna vestibulum aliquet ultrices erat tortor sollicitudin mi sit amet lobortis sapien sapien non mi integer ac neque duis bibendum morbi non quam nec dui luctus rutrum nulla tellus in sagittis dui vel nisl duis ac nibh fusce lacus purus aliquet at');
insert into article (title, text) values ('eu orci', 'enim blandit mi in porttitor pede justo eu massa donec dapibus duis at velit eu est congue elementum in hac habitasse platea dictumst morbi vestibulum velit id pretium iaculis diam erat fermentum justo nec condimentum neque sapien placerat ante nulla justo aliquam quis turpis eget elit sodales scelerisque mauris sit amet eros suspendisse accumsan tortor quis turpis sed ante vivamus tortor duis mattis egestas metus aenean fermentum donec ut mauris eget massa tempor convallis nulla neque libero convallis eget eleifend luctus ultricies eu nibh quisque id justo sit amet sapien');
insert into article (title, text) values ('adipiscing lorem vitae', 'vitae quam suspendisse potenti nullam porttitor lacus at turpis donec posuere metus vitae ipsum aliquam non mauris morbi non lectus aliquam sit amet diam in magna bibendum imperdiet nullam orci pede venenatis non sodales sed tincidunt eu felis fusce posuere felis sed lacus morbi sem mauris laoreet ut rhoncus aliquet pulvinar sed nisl nunc rhoncus dui vel sem sed sagittis nam congue risus semper porta volutpat quam pede lobortis ligula sit amet');
insert into article (title, text) values ('aenean fermentum', 'nascetur ridiculus mus etiam vel augue vestibulum rutrum rutrum neque aenean auctor gravida sem praesent id massa id nisl venenatis lacinia aenean sit amet justo morbi ut odio cras mi pede malesuada in imperdiet et commodo vulputate justo in blandit ultrices enim lorem ipsum dolor sit amet consectetuer adipiscing elit proin interdum mauris non ligula pellentesque ultrices phasellus id sapien in sapien iaculis congue vivamus metus arcu adipiscing molestie hendrerit at vulputate vitae nisl aenean lectus pellentesque eget nunc donec quis orci eget orci vehicula condimentum curabitur in libero ut massa volutpat convallis morbi');
insert into article (title, text) values ('consequat lectus in est', 'venenatis turpis enim blandit mi in porttitor pede justo eu massa donec dapibus duis at velit eu est congue elementum in hac habitasse platea');
insert into article (title, text) values ('justo sollicitudin ut suscipit', 'nibh in hac habitasse platea dictumst aliquam augue quam sollicitudin vitae consectetuer eget rutrum at lorem integer tincidunt ante vel ipsum praesent blandit lacinia erat vestibulum sed magna at nunc commodo placerat praesent blandit nam nulla integer pede justo lacinia eget tincidunt eget tempus vel pede morbi porttitor lorem id ligula');


insert into author_article (author_id, article_id) values (3, 14);
insert into author_article (author_id, article_id) values (10, 15);
insert into author_article (author_id, article_id) values (16, 2);
insert into author_article (author_id, article_id) values (12, 14);
insert into author_article (author_id, article_id) values (12, 8);
insert into author_article (author_id, article_id) values (6, 6);
insert into author_article (author_id, article_id) values (9, 12);
insert into author_article (author_id, article_id) values (1, 17);
insert into author_article (author_id, article_id) values (12, 7);
insert into author_article (author_id, article_id) values (20, 5);
insert into author_article (author_id, article_id) values (10, 4);
insert into author_article (author_id, article_id) values (19, 5);
insert into author_article (author_id, article_id) values (10, 8);
insert into author_article (author_id, article_id) values (20, 12);
insert into author_article (author_id, article_id) values (1, 18);
insert into author_article (author_id, article_id) values (2, 7);
insert into author_article (author_id, article_id) values (16, 1);
insert into author_article (author_id, article_id) values (19, 19);
insert into author_article (author_id, article_id) values (2, 12);
insert into author_article (author_id, article_id) values (3, 2);
insert into author_article (author_id, article_id) values (6, 3);
insert into author_article (author_id, article_id) values (12, 13);
insert into author_article (author_id, article_id) values (3, 15);
insert into author_article (author_id, article_id) values (16, 14);
insert into author_article (author_id, article_id) values (10, 6);
insert into author_article (author_id, article_id) values (16, 14);
insert into author_article (author_id, article_id) values (12, 13);
insert into author_article (author_id, article_id) values (17, 10);
insert into author_article (author_id, article_id) values (9, 13);
insert into author_article (author_id, article_id) values (6, 12);
insert into author_article (author_id, article_id) values (11, 12);
insert into author_article (author_id, article_id) values (9, 17);
insert into author_article (author_id, article_id) values (15, 12);
insert into author_article (author_id, article_id) values (16, 14);
insert into author_article (author_id, article_id) values (20, 5);
insert into author_article (author_id, article_id) values (1, 4);
insert into author_article (author_id, article_id) values (11, 2);
insert into author_article (author_id, article_id) values (17, 7);
insert into author_article (author_id, article_id) values (20, 19);
insert into author_article (author_id, article_id) values (4, 8);
