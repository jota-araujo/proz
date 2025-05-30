#este programa pede os dados de altura e peso e calcula o IMC do usuario
altura = float(input("Digite a sua altura:"))
peso = float(input("Digite o seu peso:"))

imc = peso / (altura * altura)
print("O seu IMC é de: ",imc)
