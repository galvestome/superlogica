SELECT CONCAT(usuario.nome, ' - ', info.genero) AS usuário,
CASE WHEN (DATE_FORMAT(CURRENT_DATE, "%Y") - info.ano_nascimento) > 50 THEN "SIM"
ELSE "NÃO"
END maior_50_anos
FROM usuario
JOIN info ON info.cpf = usuario.cpf AND info.genero = "M"
ORDER BY usuario.cpf LIMIT 3