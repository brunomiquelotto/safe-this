INSERT INTO TB_PERMISSIONS(Controller, Action, Description) VALUES ('AdminController','Index','Painel Administrativo');
INSERT INTO TB_PERMISSIONS(Controller, Action, Description) VALUES ('PlacesController','Index','Visualizar Setores');
INSERT INTO TB_PERMISSIONS(Controller, Action, Description) VALUES ('PlacesController','Create','Criar Setores');
INSERT INTO TB_PERMISSIONS(Controller, Action, Description) VALUES ('PlacesController','Save','Salvar Setores');
INSERT INTO TB_PERMISSIONS(Controller, Action, Description) VALUES ('PlacesController','Delete','Apagar Setores');
INSERT INTO TB_PERMISSIONS(Controller, Action, Description) VALUES ('PlacesController','Edit','Editar Setores');
INSERT INTO TB_PERMISSIONS(Controller, Action, Description) VALUES ('ReportsController','Index','Página Relatórios');
INSERT INTO TB_PERMISSIONS(Controller, Action, Description) VALUES ('ReportsController','View','Visualizar os Relatórios');
INSERT INTO TB_PERMISSIONS(Controller, Action, Description) VALUES ('UsersController','Index','Visualizar usuários');
INSERT INTO TB_PERMISSIONS(Controller, Action, Description) VALUES ('UsersController','Edit','Editar usuários');
INSERT INTO TB_PERMISSIONS(Controller, Action, Description) VALUES ('UsersController','Create', 'Criar usuários');
INSERT INTO TB_PERMISSIONS(Controller, Action, Description) VALUES ('UsersController','Delete', 'Remover usuários');
INSERT INTO TB_PERMISSIONS(Controller, Action, Description) VALUES ('UsersController','Save', 'Salvar usuários');

INSERT INTO TB_PROFILES (Description, FullAccess) VALUES('Administrador', 1);
INSERT INTO TB_PROFILES (Description, FullAccess) VALUES('Moderador', 0);

INSERT INTO TB_USERS(Name, Email, Password, Profile_Id) VALUES ('Administrador', 'admin@safethis.com', '$2a$08$2sGQinTFe3GF/YqAYQ66auL9o6HeFCQryHdqUDvuEVN0J1vdhimii', 1);

INSERT INTO TB_PROFILE_PERMISSIONS (Permission_Id, Profile_Id, Granted) VALUES (1, 2, 1);
INSERT INTO TB_PROFILE_PERMISSIONS (Permission_Id, Profile_Id, Granted) VALUES (2, 2, 1);
INSERT INTO TB_PROFILE_PERMISSIONS (Permission_Id, Profile_Id, Granted) VALUES (3, 2, 0);
INSERT INTO TB_PROFILE_PERMISSIONS (Permission_Id, Profile_Id, Granted) VALUES (4, 2, 0);
INSERT INTO TB_PROFILE_PERMISSIONS (Permission_Id, Profile_Id, Granted) VALUES (5, 2, 0);
INSERT INTO TB_PROFILE_PERMISSIONS (Permission_Id, Profile_Id, Granted) VALUES (6, 2, 0);
INSERT INTO TB_PROFILE_PERMISSIONS (Permission_Id, Profile_Id, Granted) VALUES (7, 2, 0);
INSERT INTO TB_PROFILE_PERMISSIONS (Permission_Id, Profile_Id, Granted) VALUES (8, 2, 0);
INSERT INTO TB_PROFILE_PERMISSIONS (Permission_Id, Profile_Id, Granted) VALUES (9, 2, 0);
INSERT INTO TB_PROFILE_PERMISSIONS (Permission_Id, Profile_Id, Granted) VALUES (10, 2, 0);
INSERT INTO TB_PROFILE_PERMISSIONS (Permission_Id, Profile_Id, Granted) VALUES (11, 2, 0);
INSERT INTO TB_PROFILE_PERMISSIONS (Permission_Id, Profile_Id, Granted) VALUES (12, 2, 0);
INSERT INTO TB_PROFILE_PERMISSIONS (Permission_Id, Profile_Id, Granted) VALUES (13, 2, 0);


INSERT INTO TB_OCURRENCE_STATUSES (Description) VALUES ('Aguardando Análise'), ('Rejeitado'), ('Aceito'), ('Em andamento'), ('Finalizado');

INSERT INTO TB_OCURRENCE_PRIORITIES (Description) VALUES ('Baixa'), ('Média'), ('Alta');