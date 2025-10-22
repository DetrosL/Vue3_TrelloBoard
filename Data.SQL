-- BOARD
INSERT INTO simples_web_laiz_db.boards
(id, title)
VALUES(1, 'board1');

-- USER 
INSERT INTO simples_web_laiz_db.users
(id, `status`, `name`, email, email_verified_at, `password`, two_factor_secret, two_factor_recovery_codes, two_factor_confirmed_at, remember_token, created_at, updated_at)
VALUES(1, 'A', 'user1', 'teste@teste.com', NULL, '$2y$12$2rEWwQvyRSV0M7czTGcasexdqQ6Oo4t2.5CNtm7T3/k4PBBwowWgi', NULL, NULL, NULL, 'vIpoQFQpcitXXI7R9r5Q2zO4FnoqPVOU8FoViYshdESoI6GHMEAxm6LO88J8', '2025-10-17 15:26:41', '2025-10-17 15:26:41');
INSERT INTO simples_web_laiz_db.users
(id, `status`, `name`, email, email_verified_at, `password`, two_factor_secret, two_factor_recovery_codes, two_factor_confirmed_at, remember_token, created_at, updated_at)
VALUES(2, 'A', 'user2', 'teste@gmail.com', NULL, '$2y$12$UR/ZgvO/E5pbvTZTLToCNuihvEfzR.ud4cUfn1fPJ8PVj6I8csQDm', NULL, NULL, NULL, NULL, '2025-10-20 11:14:38', '2025-10-20 11:14:38');

-- BOARD_USER
INSERT INTO simples_web_laiz_db.board_user
(id, user_id, board_id, permission)
VALUES(1, 1, 1, 'A');

-- POSITION
INSERT INTO simples_web_laiz_db.positions
(id, board_id, cod, `desc`, `status`)
VALUES(1, 1, 1, 'TESTE_COLUMN', 'T');
INSERT INTO simples_web_laiz_db.positions
(id, board_id, cod, `desc`, `status`)
VALUES(2, 1, 2, 'TESTE_COLUMN2', 'I');
INSERT INTO simples_web_laiz_db.positions
(id, board_id, cod, `desc`, `status`)
VALUES(3, 1, 3, 'TESTE_COLUMN3', 'E');

-- TASK
INSERT INTO simples_web_laiz_db.tasks
(id, position_id, creator_id, user_id, nome, `desc`, dt_start, dt_end)
VALUES(1, 1, 1, 1, 'TASK1', 'DESC1', '2025-10-16 10:30:00', '2025-10-29 10:30:00');
INSERT INTO simples_web_laiz_db.tasks
(id, position_id, creator_id, user_id, nome, `desc`, dt_start, dt_end)
VALUES(2, 1, 1, 1, 'TASK2', 'DESC2', '2025-10-15 10:30:00', '2025-10-30 10:30:00');
INSERT INTO simples_web_laiz_db.tasks
(id, position_id, creator_id, user_id, nome, `desc`, dt_start, dt_end)
VALUES(3, 2, 1, 1, 'TASK3', 'DESC3', '2025-11-15 10:30:00', '2025-11-30 10:30:00');

-- TASK_USER
INSERT INTO simples_web_laiz_db.task_user
(id, user_id, task_id)
VALUES(1, 1, 1);
INSERT INTO simples_web_laiz_db.task_user
(id, user_id, task_id)
VALUES(2, 1, 2);

-- STEPS
INSERT INTO simples_web_laiz_db.steps
(id, user_id, task_id, `desc`, completed)
VALUES(1, 1, 1, 'step1', 1);
INSERT INTO simples_web_laiz_db.steps
(id, user_id, task_id, `desc`, completed)
VALUES(2, 1, 1, 'step2', 0);
INSERT INTO simples_web_laiz_db.steps
(id, user_id, task_id, `desc`, completed)
VALUES(3, 1, 1, 'step3', 1);
INSERT INTO simples_web_laiz_db.steps
(id, user_id, task_id, `desc`, completed)
VALUES(4, 1, 2, 'step4', 0);
INSERT INTO simples_web_laiz_db.steps
(id, user_id, task_id, `desc`, completed)
VALUES(5, 1, 2, 'step5', 1);
INSERT INTO simples_web_laiz_db.steps
(id, user_id, task_id, `desc`, completed)
VALUES(6, 1, 2, 'step6', 0);
INSERT INTO simples_web_laiz_db.steps
(id, user_id, task_id, `desc`, completed)
VALUES(7, 1, 2, 'step7', 0);
INSERT INTO simples_web_laiz_db.steps
(id, user_id, task_id, `desc`, completed)
VALUES(8, 1, 3, 'step8', 1);
INSERT INTO simples_web_laiz_db.steps
(id, user_id, task_id, `desc`, completed)
VALUES(9, 1, 3, 'step9', 1);
INSERT INTO simples_web_laiz_db.steps
(id, user_id, task_id, `desc`, completed)
VALUES(10, 1, 3, 'step10', 1);
INSERT INTO simples_web_laiz_db.steps
(id, user_id, task_id, `desc`, completed)
VALUES(11, 1, 3, 'step11', 1);
INSERT INTO simples_web_laiz_db.steps
(id, user_id, task_id, `desc`, completed)
VALUES(12, 1, 3, 'step12', 1);
INSERT INTO simples_web_laiz_db.steps
(id, user_id, task_id, `desc`, completed)
VALUES(13, 1, 3, 'step13', 1);

-- TAGS
INSERT INTO simples_web_laiz_db.tags
(id, `name`, `desc`, color)
VALUES(1, 'tag1', 'Tag 1', '#ff0000ff');
INSERT INTO simples_web_laiz_db.tags
(id, `name`, `desc`, color)
VALUES(3, 'tag2', 'Tag 2', '#319c23ff');
INSERT INTO simples_web_laiz_db.tags
(id, `name`, `desc`, color)
VALUES(4, 'tag3', 'Tag 3', '#319c23ff');
INSERT INTO simples_web_laiz_db.tags
(id, `name`, `desc`, color)
VALUES(5, 'tag4', 'Tag 4', '#150791ff');
INSERT INTO simples_web_laiz_db.tags
(id, `name`, `desc`, color)
VALUES(6, 'tag5', 'Tag 5', '#18aad6ff');
INSERT INTO simples_web_laiz_db.tags
(id, `name`, `desc`, color)
VALUES(7, 'back', 'Back-End', '#a2021a');

-- COMMENTS
INSERT INTO simples_web_laiz_db.comments
(id, user_id, task_id, `desc`)
VALUES(1, 1, 1, 'comm1');
INSERT INTO simples_web_laiz_db.comments
(id, user_id, task_id, `desc`)
VALUES(2, 1, 1, 'comm2');
INSERT INTO simples_web_laiz_db.comments
(id, user_id, task_id, `desc`)
VALUES(3, 1, 1, 'comm3');
INSERT INTO simples_web_laiz_db.comments
(id, user_id, task_id, `desc`)
VALUES(4, 1, 2, 'comm4');
INSERT INTO simples_web_laiz_db.comments
(id, user_id, task_id, `desc`)
VALUES(5, 1, 2, 'comm5');

-- ATTACHES
INSERT INTO simples_web_laiz_db.attaches
(id, user_id, task_id, url, qtd)
VALUES(1, 1, 1, 'url1', 1);
INSERT INTO simples_web_laiz_db.attaches
(id, user_id, task_id, url, qtd)
VALUES(2, 1, 3, 'url2', 3);
INSERT INTO simples_web_laiz_db.attaches
(id, user_id, task_id, url, qtd)
VALUES(3, 1, 3, 'url3', 2);