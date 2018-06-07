ALTER TABLE TSoo_LanguageKeyword DROP IdKeyword;
ALTER TABLE TSoo_LanguageKeyword AUTO_INCREMENT = 1;
ALTER TABLE TSoo_LanguageKeyword ADD IdKeyword int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;


DELETE FROM TSoo_LanguageKeyword WHERE KeyCode LIKE 'IdTaskLog' AND ModuleName LIKE 'TasklogModule';
INSERT INTO TSoo_LanguageKeyword ( KeyCode, KeyWord, LanguageId, CreatedDate, ModuleName ) VALUES ( 'IdTaskLog', 'Id Task Log', 1,  '2017-7-25 18:13:6', 'TasklogModule' );

DELETE FROM TSoo_LanguageKeyword WHERE KeyCode LIKE 'IdTaskLog' AND ModuleName LIKE 'TasklogModule';
INSERT INTO TSoo_LanguageKeyword ( KeyCode, KeyWord, LanguageId, CreatedDate, ModuleName ) VALUES ( 'IdTaskLog', 'Id Task Log', 1,  '2017-7-25 18:13:6', 'TasklogModule' );


DELETE FROM TSoo_LanguageKeyword WHERE KeyCode LIKE 'TaskTitle1' AND ModuleName LIKE 'TasklogModule';
INSERT INTO TSoo_LanguageKeyword ( KeyCode, KeyWord, LanguageId, CreatedDate, ModuleName ) VALUES ( 'TaskTitle1', 'Task Title 1', 1,  '2017-7-25 18:13:6', 'TasklogModule' );

DELETE FROM TSoo_LanguageKeyword WHERE KeyCode LIKE 'TaskTitle1' AND ModuleName LIKE 'TasklogModule';
INSERT INTO TSoo_LanguageKeyword ( KeyCode, KeyWord, LanguageId, CreatedDate, ModuleName ) VALUES ( 'TaskTitle1', 'Task Title 1', 1,  '2017-7-25 18:13:6', 'TasklogModule' );


DELETE FROM TSoo_LanguageKeyword WHERE KeyCode LIKE 'TaskTitle2' AND ModuleName LIKE 'TasklogModule';
INSERT INTO TSoo_LanguageKeyword ( KeyCode, KeyWord, LanguageId, CreatedDate, ModuleName ) VALUES ( 'TaskTitle2', 'Task Title 2', 1,  '2017-7-25 18:13:6', 'TasklogModule' );

DELETE FROM TSoo_LanguageKeyword WHERE KeyCode LIKE 'TaskTitle2' AND ModuleName LIKE 'TasklogModule';
INSERT INTO TSoo_LanguageKeyword ( KeyCode, KeyWord, LanguageId, CreatedDate, ModuleName ) VALUES ( 'TaskTitle2', 'Task Title 2', 1,  '2017-7-25 18:13:6', 'TasklogModule' );


DELETE FROM TSoo_LanguageKeyword WHERE KeyCode LIKE 'TaskTitle3' AND ModuleName LIKE 'TasklogModule';
INSERT INTO TSoo_LanguageKeyword ( KeyCode, KeyWord, LanguageId, CreatedDate, ModuleName ) VALUES ( 'TaskTitle3', 'Task Title 3', 1,  '2017-7-25 18:13:6', 'TasklogModule' );

DELETE FROM TSoo_LanguageKeyword WHERE KeyCode LIKE 'TaskTitle3' AND ModuleName LIKE 'TasklogModule';
INSERT INTO TSoo_LanguageKeyword ( KeyCode, KeyWord, LanguageId, CreatedDate, ModuleName ) VALUES ( 'TaskTitle3', 'Task Title 3', 1,  '2017-7-25 18:13:6', 'TasklogModule' );


DELETE FROM TSoo_LanguageKeyword WHERE KeyCode LIKE 'TaskTitle4' AND ModuleName LIKE 'TasklogModule';
INSERT INTO TSoo_LanguageKeyword ( KeyCode, KeyWord, LanguageId, CreatedDate, ModuleName ) VALUES ( 'TaskTitle4', 'Task Title 4', 1,  '2017-7-25 18:13:6', 'TasklogModule' );

DELETE FROM TSoo_LanguageKeyword WHERE KeyCode LIKE 'TaskTitle4' AND ModuleName LIKE 'TasklogModule';
INSERT INTO TSoo_LanguageKeyword ( KeyCode, KeyWord, LanguageId, CreatedDate, ModuleName ) VALUES ( 'TaskTitle4', 'Task Title 4', 1,  '2017-7-25 18:13:6', 'TasklogModule' );


DELETE FROM TSoo_LanguageKeyword WHERE KeyCode LIKE 'TaskDate' AND ModuleName LIKE 'TasklogModule';
INSERT INTO TSoo_LanguageKeyword ( KeyCode, KeyWord, LanguageId, CreatedDate, ModuleName ) VALUES ( 'TaskDate', 'Task Date', 1,  '2017-7-25 18:13:6', 'TasklogModule' );

DELETE FROM TSoo_LanguageKeyword WHERE KeyCode LIKE 'TaskDate' AND ModuleName LIKE 'TasklogModule';
INSERT INTO TSoo_LanguageKeyword ( KeyCode, KeyWord, LanguageId, CreatedDate, ModuleName ) VALUES ( 'TaskDate', 'Task Date', 1,  '2017-7-25 18:13:6', 'TasklogModule' );




