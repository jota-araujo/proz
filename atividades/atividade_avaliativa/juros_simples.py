valor_principal = float(input("Digite o valor que será pego:"))
taxa_de_juros = int(input("Qual a taxa de juros a.a:"))
prazo = int(input("Digite por quantos anos pagará essa divida:"))
montante = valor_principal+(valor_principal*taxa_de_juros*prazo/100)
print("O valor que será pago ao fim do emprestimo é de:",montante)
