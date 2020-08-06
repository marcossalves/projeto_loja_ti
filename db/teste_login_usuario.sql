
SELECT 
us.idusuario,
us.nomeusuario,
us.foto,
cl.nomecliente,
cl.cpf,
cl.sexo,
ct.email,
ct.telefone,
en.tipo,
en.logradouro,
en.numero,
en.complemento,
en.bairro,
en.cep

from usuario us inner join cliente cl on us.idusuario = cl.idusuario
inner join contato ct on ct.idcontato = cl.idcontato
inner join endereco en on en.idendereco = cl.idendereco

where us.nomeusuario ='admin' and us.senha = md5('123');