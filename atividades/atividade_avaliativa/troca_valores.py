# Solicita ao usuário os dois valores
valor1 = input("Digite o primeiro valor: ")
valor2 = input("Digite o segundo valor: ")

# Exibe os valores antes da troca
print("\nAntes da troca:")
print("Valor 1:", valor1)
print("Valor 2:", valor2)

# Troca os valores
valor1, valor2 = valor2, valor1

# Exibe os valores depois da troca
print("\nDepois da troca:")
print("Valor 1:", valor1)
print("Valor 2:", valor2)
