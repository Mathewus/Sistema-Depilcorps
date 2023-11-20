
-- Inserção de dados para o banco: `sysdp`

-- tabela usuarios

INSERT INTO `users` (`id`,`nome`,`email`,`email_verified_at`,`password`,`tipo`,`status`,`foto`,`remember_token`,`created_at`, `updated_at`) VALUES
(2,"Matheus","matheus@gmail.com",NULL,"$2y$10$3du1QSRcTbDgTuWOJ.5kS.JSKjE2iKqP.KludHDe133F3kdd6P9iK","admin","ativo","G3e7q7OK4x2CpSj1NC9HuZLyo9L2wMLs2RgVAtmy.jpg",NULL,"2023-10-28 17:01:54","2023-10-28 17:01:54"),
(3,"Miguel","miguel@gmail.com",NULL,"$2y$10$KZHX.Y3depMs5HL5UKjj7.TNFlgn.xRABYNwv2ftclz9Z7mP6YRvG","admin","ativo",NULL,NULL,"2023-10-28 17:11:25","2023-11-04 03:44:01"),
(4,"Cândida","candidafiona@hotmail.com",NULL,"$2y$10$JHdeFojuyethAZ4AtL7eMOOPkY.V4muRDba8y966R0vsqVhI9ZNaq","admin","ativo",NULL,NULL,"2023-10-30 00:15:06","2023-10-30 00:15:06");


-- tabela clientes 


INSERT INTO `clientes` (`id`,`nome`,`data_nasc`,`sexo`,`email`,`telefone`,`telefone_contato`,`cidade`,`estado`,`logradouro`,`bairro`,`cep`,`id_user`,`created_at`,`updated_at`) VALUES
(1,"Beatriz Vitória","2001-07-06","feminino","beatriz@hotmail.com","(87) 98151-6554","(75) 21121-2312","Jatobá","Pernambuco","Itumbiara, 02","Itaparica","56470-000",1,"2023-10-30 01:09:00","2023-11-09 02:59:52"),
(2,"Camila Maria da Silva","1984-11-14","feminino","camilamaria@outlook.com","(87) 98161-4646","(87) 98161-4646","Jatobá","Pernambuco","Rua Itutinga, 120","Itaparica","56470-000",1,"2023-11-10 02:00:17","2023-11-10 02:00:17"),
(3,"Maralisa Fonseca","1970-10-12","feminino",NULL,"(75) 99886-7722","(75) 99886-7722","Jatobá","Pernambuco","Rua Ibitinga","Itaparica","56470-000",1,"2023-11-10 02:03:56","2023-11-10 02:03:56"),
(4,"Fernanda","2005-01-25","feminino",NULL,"(87) 98153-4275","(87) 98153-4275","Jatobá","Pernambuco","Rua Água Vermelha","Itaparica","56470-000",1,"2023-11-10 02:07:26","2023-11-10 02:07:26"),
(5,"Ana Paula","1981-10-06","feminino",NULL,"(87) 98153-4275","(87) 98153-4275","Jatobá","Pernambuco","Rua Capivara, 135","Itaparica","56470-000",1,"2023-11-10 02:09:09","2023-11-10 02:09:09"),
(6,"Paloma Magalhães","1993-09-10","feminino",NULL,"(87) 98113-7532","(87) 98113-7532","Jatobá","Pernambuco","Rua do sol, 118","Itaparica","56470-000",1,"2023-11-10 02:11:42","2023-11-19 03:35:45"),
(7,"Rodrigo Souza","1999-10-10","masculino","rodrigosouza@gmail.com","(75) 98832-3232","(75) 98832-3232","Paulo Afonso","Bahia","Rua das Almeidas","Centro","48602-090",1,"2023-11-10 17:29:02","2023-11-10 17:29:02"),
(8,"Regina Celi",NULL,"feminino",NULL,"(87) 98156-6420",NULL,NULL,NULL,NULL,NULL,NULL,1,"2023-11-19 03:40:09","2023-11-19 03:54:20");

-- tabela servicos

INSERT INTO `servicos` (`id`, `descricao`, `preco`, `created_at`, `updated_at`) VALUES
(1,"Sobrancelha simples",20.00,"2023-10-30 01:10:35","2023-11-03 01:33:19"),
(2,"Depilação intima feminina total",65.00,"2023-10-30 01:11:11","2023-10-30 01:11:32"),
(3,"Depilação intima masculina total",80.00,"2023-10-30 01:12:46","2023-10-30 01:12:46"),
(4,"Limpeza de pele facial",130.00,"2023-10-30 01:13:31","2023-10-30 01:13:31"),
(5,"Depilação axilar feminina",20.00,"2023-10-30 01:14:06","2023-10-30 01:26:56"),
(6,"Depilação perna total feminina",70.00,"2023-10-30 01:14:44","2023-10-30 01:14:44"),
(7,"Depilação meia perna feminina",30.00,"2023-10-30 01:15:19","2023-10-30 01:15:19"),
(8,"Depilação coxa feminina",40.00,"2023-10-30 01:16:11","2023-10-30 01:16:11"),
(9,"Depilação total  perna masculina",80.00,"2023-10-30 01:16:51","2023-10-30 01:16:51"),
(10,"Depilação barriga feminina",25.00,"2023-10-30 01:17:34","2023-10-30 01:17:34"),
(11,"Depilação barriga masculina",30.00,"2023-10-30 01:18:37","2023-10-30 01:18:37"),
(12,"Depilação Masculina Barba",50.00,"2023-10-30 01:19:00","2023-10-30 01:19:00"),
(13,"Depilação buço feminino",5.00,"2023-10-30 01:19:26","2023-10-30 01:19:26"),
(14,"Depilação rosto feminino",15.00,"2023-10-30 01:19:49","2023-10-30 01:19:49"),
(15,"Sobrancelha masculina",20.00,"2023-10-30 01:20:22","2023-10-30 01:20:22"),
(16,"Depilação axilar masculina",25.00,"2023-10-30 01:20:50","2023-10-30 01:21:40"),
(17,"Massagem Relaxante por sessão",100.00,"2023-10-30 01:22:23","2023-10-30 01:22:23"),
(18,"Drenagem linfática por sessão",120.00,"2023-10-30 01:22:52","2023-10-30 01:22:52"),
(19,"Depilação costas masculinas",40.00,"2023-10-30 01:23:54","2023-10-30 01:23:54"),
(20,"Depilação costas femininas",30.00,"2023-10-30 01:23:56","2023-10-30 01:25:31");


-- tabela agendamentos

INSERT INTO `agendamentos` (`id`, `data`, `hora`, `observacao`, `status`, `valor_total`, `id_cliente`, `id_user`,`created_at`, `updated_at`) VALUES
(1,"2023-08-11","18:30:00","Serviço Pago","agendado",25.00,1,1,"2023-11-16 21:35:43","2023-11-16 21:36:31"),
(2,"2023-11-25","16:40:00","Pagará dia 10 de dezembro","agendado",30.00,3,1,"2023-11-16 21:38:27","2023-11-16 21:38:27"),
(3,"2023-11-10","15:00:00","Pago dia 05 de novembro","agendado",70.00,2,1,"2023-11-16 21:40:21","2023-11-16 21:40:21"),
(4,"2023-11-20","17:00:00",NULL,"agendado",230.00,2,1,"2023-11-16 21:41:35","2023-11-16 21:41:35"),
(5,"2023-11-26","09:30:00",NULL,"agendado",150.00,5,1,"2023-11-16 21:43:51","2023-11-16 21:43:51"),
(6,"2024-01-15","13:30:00",NULL,"agendado",100.00,6,1,"2023-11-16 21:45:29","2023-11-16 21:45:29"),
(7,"2023-10-28","18:30:00","Pagamento pendente","agendado",30.00,1,1,"2023-11-16 21:48:56","2023-11-16 21:48:56"),
(8,"2023-11-21","19:00:00",NULL,"agendado",25.00,5,1,"2023-11-16 21:46:55","2023-11-16 21:46:55");


-- tabela agendamento_servico

INSERT INTO `agendamento_servico` (`id_servico`, `id_agendamento`) VALUES
(4,4),
(4,5),
(5,1),
(5,5),
(6,3),
(7,8),
(10,7),
(13,1),
(17,4),
(17,6),
(20,2);



