
-- Inserção de dados para o banco: `sysdp`



-- tabela clientes 

INSERT INTO `clientes` (`id`,`nome`,`data_nasc`,`sexo`,`email`,`telefone`,`telefone_contato`,`cidade`,`estado`,`logradouro`,`bairro`,`cep`,`id_user`,`created_at`,`updated_at`) VALUES
(1,"Ricardo","1985-12-15","masculino",NULL,"(75) 98142-4131",NULL,NULL,NULL,NULL,NULL,NULL,1,"2023-11-20 02:06:31","2023-11-20 02:06:31"),
(2,"Débora","1999-06-10","feminino",NULL,"(75) 91223-1232",NULL,NULL,NULL,NULL,NULL,NULL,1,"2023-11-20 02:07:05","2023-11-20 02:07:05"),
(3,"Thiago","1980-05-12","masculino",NULL,"(87) 91213-1331",NULL,NULL,NULL,NULL,NULL,NULL,1,"2023-11-20 02:07:45","2023-11-20 02:07:45"),
(4,"Jonathan","2000-09-15","masculino",NULL,"(75) 98123-2312",NULL,NULL,NULL,NULL,NULL,NULL,1,"2023-11-20 02:08:30","2023-11-20 02:08:30"),
(5,"João","1998-02-02","masculino",NULL,"(75) 98312-3123",NULL,NULL,NULL,NULL,NULL,NULL,1,"2023-11-20 02:08:58","2023-11-20 02:08:58"),
(6,"Amanda","1975-07-06","feminino",NULL,"(75) 99897-8312",NULL,NULL,NULL,NULL,NULL,NULL,1,"2023-11-20 02:09:28","2023-11-20 02:09:28"),
(7,"Jenifer","1990-08-10","feminino",NULL,"(75) 91212-1212",NULL,NULL,NULL,NULL,NULL,NULL,1,"2023-11-20 02:10:02","2023-11-20 02:10:02"),
(8,"Júlia","1989-10-23","feminino",NULL,"(75) 98343-4534",NULL,NULL,NULL,NULL,NULL,NULL,1,"2023-11-20 02:10:44","2023-11-20 02:10:44"),
(9,"Thomas","1995-11-10","masculino",NULL,"(87) 98755-6464",NULL,NULL,NULL,NULL,NULL,NULL,1,"2023-11-20 02:11:22","2023-11-20 02:11:22"),
(10,"Isabella","1999-03-08","feminino",NULL,"(75) 96754-6132",NULL,NULL,NULL,NULL,NULL,NULL,1,"2023-11-20 02:11:53","2023-11-20 02:11:53"),
(11,"Antony","2002-11-11","masculino",NULL,"(87) 98232-1432",NULL,NULL,NULL,NULL,NULL,NULL,1,"2023-11-20 02:48:35","2023-11-20 02:48:35");


-- tabela agendamentos

INSERT INTO `agendamentos` (`id`, `data`, `hora`, `observacao`, `status`, `valor_total`, `id_cliente`, `id_user`,`created_at`, `updated_at`) VALUES
(1,"2023-12-10","16:00:00",NULL,"agendado",30.00,6,1,"2023-11-20 02:12:29","2023-11-20 02:12:29"),
(2,"2023-11-28","17:00:00",NULL,"agendado",100.00,6,1,"2023-11-20 02:13:12","2023-11-20 02:13:12"),
(3,"2023-11-10","15:00:00","Cliente atendida, já efetuou o pagamento","finalizado",15.00,2,1,"2023-11-20 02:14:04","2023-11-20 02:14:41"),
(4,"2023-12-05","19:00:00",NULL,"agendado",20.00,10,1,"2023-11-20 02:15:09","2023-11-20 02:15:09"),
(5,"2023-12-16","10:00:00",NULL,"agendado",40.00,7,1,"2023-11-20 02:17:25","2023-11-20 02:17:25"),
(6,"2024-01-15","14:30:00",NULL,"agendado",70.00,7,1,"2023-11-20 02:18:23","2023-11-20 02:18:23"),
(7,"2023-11-24","16:30:00",NULL,"agendado",50.00,1,1,"2023-11-20 02:19:04","2023-11-20 02:19:04"),
(8,"2023-12-06","17:00:00",NULL,"agendado",20.00,5,1,"2023-11-20 02:44:31","2023-11-20 02:44:31"),
(9,"2023-12-06","09:30:00",NULL,"agendado",80.00,3,1,"2023-11-20 02:45:30","2023-11-20 02:46:54"),
(10,"2023-12-08","08:30:00",NULL,"agendado",25.00,9,1,"2023-11-20 02:46:20","2023-11-20 02:46:20"),
(11,"2023-12-08","08:30:00",NULL,"agendado",25.00,9,1,"2023-11-20 02:46:21","2023-11-20 02:46:21");



-- tabela agendamento_servico

INSERT INTO `agendamento_servico` (`id_servico`, `id_agendamento`) VALUES
(5,4),
(6,6),
(8,5),
(9,9),
(12,7),
(14,3),
(15,8),
(16,10),
(16,11),
(17,2),
(20,1);



-- tabela servicos - Serviços reais

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



