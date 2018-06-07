ALTER TABLE TSoo_LanguageKeyword DROP IdKeyword;
ALTER TABLE TSoo_LanguageKeyword AUTO_INCREMENT = 1;
ALTER TABLE TSoo_LanguageKeyword ADD IdKeyword int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;


DELETE FROM TSoo_LanguageKeyword WHERE KeyCode LIKE 'IdProcess' AND ModuleName LIKE 'ProcessModule';
INSERT INTO TSoo_LanguageKeyword ( KeyCode, KeyWord, LanguageId, CreatedDate, ModuleName ) VALUES ( 'IdProcess', 'Id Process', 1,  '2017-7-21 15:23:52', 'ProcessModule' );

DELETE FROM TSoo_LanguageKeyword WHERE KeyCode LIKE 'IdProcess' AND ModuleName LIKE 'ProcessModule';
INSERT INTO TSoo_LanguageKeyword ( KeyCode, KeyWord, LanguageId, CreatedDate, ModuleName ) VALUES ( 'IdProcess', 'Id Process', 1,  '2017-7-21 15:23:52', 'ProcessModule' );


DELETE FROM TSoo_LanguageKeyword WHERE KeyCode LIKE 'ProcessNo' AND ModuleName LIKE 'ProcessModule';
INSERT INTO TSoo_LanguageKeyword ( KeyCode, KeyWord, LanguageId, CreatedDate, ModuleName ) VALUES ( 'ProcessNo', 'Process No', 1,  '2017-7-21 15:23:52', 'ProcessModule' );

DELETE FROM TSoo_LanguageKeyword WHERE KeyCode LIKE 'ProcessNo' AND ModuleName LIKE 'ProcessModule';
INSERT INTO TSoo_LanguageKeyword ( KeyCode, KeyWord, LanguageId, CreatedDate, ModuleName ) VALUES ( 'ProcessNo', 'Process No', 1,  '2017-7-21 15:23:52', 'ProcessModule' );


DELETE FROM TSoo_LanguageKeyword WHERE KeyCode LIKE 'ProcessName' AND ModuleName LIKE 'ProcessModule';
INSERT INTO TSoo_LanguageKeyword ( KeyCode, KeyWord, LanguageId, CreatedDate, ModuleName ) VALUES ( 'ProcessName', 'Process Name', 1,  '2017-7-21 15:23:52', 'ProcessModule' );

DELETE FROM TSoo_LanguageKeyword WHERE KeyCode LIKE 'ProcessName' AND ModuleName LIKE 'ProcessModule';
INSERT INTO TSoo_LanguageKeyword ( KeyCode, KeyWord, LanguageId, CreatedDate, ModuleName ) VALUES ( 'ProcessName', 'Process Name', 1,  '2017-7-21 15:23:52', 'ProcessModule' );


DELETE FROM TSoo_LanguageKeyword WHERE KeyCode LIKE 'ProcessInfo' AND ModuleName LIKE 'ProcessModule';
INSERT INTO TSoo_LanguageKeyword ( KeyCode, KeyWord, LanguageId, CreatedDate, ModuleName ) VALUES ( 'ProcessInfo', 'Process Info', 1,  '2017-7-21 15:23:52', 'ProcessModule' );

DELETE FROM TSoo_LanguageKeyword WHERE KeyCode LIKE 'ProcessInfo' AND ModuleName LIKE 'ProcessModule';
INSERT INTO TSoo_LanguageKeyword ( KeyCode, KeyWord, LanguageId, CreatedDate, ModuleName ) VALUES ( 'ProcessInfo', 'Process Info', 1,  '2017-7-21 15:23:52', 'ProcessModule' );


DELETE FROM TSoo_LanguageKeyword WHERE KeyCode LIKE 'ProcessCreatedDate' AND ModuleName LIKE 'ProcessModule';
INSERT INTO TSoo_LanguageKeyword ( KeyCode, KeyWord, LanguageId, CreatedDate, ModuleName ) VALUES ( 'ProcessCreatedDate', 'Process Created Date', 1,  '2017-7-21 15:23:52', 'ProcessModule' );

DELETE FROM TSoo_LanguageKeyword WHERE KeyCode LIKE 'ProcessCreatedDate' AND ModuleName LIKE 'ProcessModule';
INSERT INTO TSoo_LanguageKeyword ( KeyCode, KeyWord, LanguageId, CreatedDate, ModuleName ) VALUES ( 'ProcessCreatedDate', 'Process Created Date', 1,  '2017-7-21 15:23:52', 'ProcessModule' );


DELETE FROM TSoo_LanguageKeyword WHERE KeyCode LIKE 'application_ApplicationName' AND ModuleName LIKE 'ProcessModule';
INSERT INTO TSoo_LanguageKeyword ( KeyCode, KeyWord, LanguageId, CreatedDate, ModuleName ) VALUES ( 'application_ApplicationName', 'Application', 1,  '2017-7-21 15:23:52', 'ProcessModule' );

DELETE FROM TSoo_LanguageKeyword WHERE KeyCode LIKE 'ApplicationId' AND ModuleName LIKE 'ProcessModule';
INSERT INTO TSoo_LanguageKeyword ( KeyCode, KeyWord, LanguageId, CreatedDate, ModuleName ) VALUES ( 'ApplicationId', 'Application', 1,  '2017-7-21 15:23:52', 'ProcessModule' );


DELETE FROM TSoo_LanguageKeyword WHERE KeyCode LIKE 'PreviousWorkflowEvaluatorId' AND ModuleName LIKE 'ProcessModule';
INSERT INTO TSoo_LanguageKeyword ( KeyCode, KeyWord, LanguageId, CreatedDate, ModuleName ) VALUES ( 'PreviousWorkflowEvaluatorId', 'Previous Workflow Evaluator Id', 1,  '2017-7-21 15:23:52', 'ProcessModule' );

DELETE FROM TSoo_LanguageKeyword WHERE KeyCode LIKE 'PreviousWorkflowEvaluatorId' AND ModuleName LIKE 'ProcessModule';
INSERT INTO TSoo_LanguageKeyword ( KeyCode, KeyWord, LanguageId, CreatedDate, ModuleName ) VALUES ( 'PreviousWorkflowEvaluatorId', 'Previous Workflow Evaluator Id', 1,  '2017-7-21 15:23:52', 'ProcessModule' );


DELETE FROM TSoo_LanguageKeyword WHERE KeyCode LIKE 'NextWorkflowEvaluatorId' AND ModuleName LIKE 'ProcessModule';
INSERT INTO TSoo_LanguageKeyword ( KeyCode, KeyWord, LanguageId, CreatedDate, ModuleName ) VALUES ( 'NextWorkflowEvaluatorId', 'Next Workflow Evaluator Id', 1,  '2017-7-21 15:23:52', 'ProcessModule' );

DELETE FROM TSoo_LanguageKeyword WHERE KeyCode LIKE 'NextWorkflowEvaluatorId' AND ModuleName LIKE 'ProcessModule';
INSERT INTO TSoo_LanguageKeyword ( KeyCode, KeyWord, LanguageId, CreatedDate, ModuleName ) VALUES ( 'NextWorkflowEvaluatorId', 'Next Workflow Evaluator Id', 1,  '2017-7-21 15:23:52', 'ProcessModule' );


DELETE FROM TSoo_LanguageKeyword WHERE KeyCode LIKE 'workflow_WorkflowName' AND ModuleName LIKE 'ProcessModule';
INSERT INTO TSoo_LanguageKeyword ( KeyCode, KeyWord, LanguageId, CreatedDate, ModuleName ) VALUES ( 'workflow_WorkflowName', 'Workflow', 1,  '2017-7-21 15:23:52', 'ProcessModule' );

DELETE FROM TSoo_LanguageKeyword WHERE KeyCode LIKE 'WorkflowId' AND ModuleName LIKE 'ProcessModule';
INSERT INTO TSoo_LanguageKeyword ( KeyCode, KeyWord, LanguageId, CreatedDate, ModuleName ) VALUES ( 'WorkflowId', 'Workflow', 1,  '2017-7-21 15:23:52', 'ProcessModule' );


DELETE FROM TSoo_LanguageKeyword WHERE KeyCode LIKE 'CreatedByUserId' AND ModuleName LIKE 'ProcessModule';
INSERT INTO TSoo_LanguageKeyword ( KeyCode, KeyWord, LanguageId, CreatedDate, ModuleName ) VALUES ( 'CreatedByUserId', 'Create by Id', 1,  '2017-7-21 15:23:52', 'ProcessModule' );

DELETE FROM TSoo_LanguageKeyword WHERE KeyCode LIKE 'CreatedByUserId' AND ModuleName LIKE 'ProcessModule';
INSERT INTO TSoo_LanguageKeyword ( KeyCode, KeyWord, LanguageId, CreatedDate, ModuleName ) VALUES ( 'CreatedByUserId', 'Create by Id', 1,  '2017-7-21 15:23:52', 'ProcessModule' );


DELETE FROM TSoo_LanguageKeyword WHERE KeyCode LIKE 'processgroup_ProcessGroupName' AND ModuleName LIKE 'ProcessModule';
INSERT INTO TSoo_LanguageKeyword ( KeyCode, KeyWord, LanguageId, CreatedDate, ModuleName ) VALUES ( 'processgroup_ProcessGroupName', 'Process Group', 1,  '2017-7-21 15:23:52', 'ProcessModule' );

DELETE FROM TSoo_LanguageKeyword WHERE KeyCode LIKE 'ProcessGroupId' AND ModuleName LIKE 'ProcessModule';
INSERT INTO TSoo_LanguageKeyword ( KeyCode, KeyWord, LanguageId, CreatedDate, ModuleName ) VALUES ( 'ProcessGroupId', 'Process Group', 1,  '2017-7-21 15:23:52', 'ProcessModule' );




