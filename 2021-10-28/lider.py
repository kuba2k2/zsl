a = [1, 2, 3, 4, 3, 4, 5, 3, 3, 1]
b = [-3, 0, 0, 3, 0, -2, 0]
c = [9, 6, 7, 6, 2, 2, 2, 2]

def lider(a: list) -> int:
	# n - ilosc elementow w zbiorze
	n = len(a)
	# L poczatkowo jest pierwszym elementem
	L = a[0]
	# pom - zmienna pomocnicza w pierwszej petli
	pom = 1

	# przejdz przez wszystkie elementy oprocz zerowego (bo jest nim L)
	for i in range(1, n):
		if pom == 0:
			# jesli pom dojdzie do zera, wybierz nowego L
			L = a[i]
			# ..oraz zwieksz pom
			pom = 1
		elif a[i] == L:
			# liczba rowna sie L, zwieksz pom
			pom += 1
		else:
			# liczba nie rowna sie L, zmniejsz pom
			pom -= 1

	# brak lidera
	if pom == 0:
		return None

	ile = 0
	# policz ile razy L wystepuje w tablicy a[]
	for i in range(0, n):
		# element a[i] jest rowny L, zwieksz licznik
		if a[i] == L:
			ile += 1

	# lider znaleziony, jesli L zajmuje wiecej niz polowe zbioru
	if ile > (n / 2):
		return L
	# brak lidera w zbiorze
	return None

if __name__ == "__main__":
	# dane wejsciowe:
	#   - zbior a[]
	# dane wyjsciowe:
	#   - liczba bedaca liderem, albo None jesli brak lidera

	# zbior A nie ma lidera; najczesciej wystepujaca liczba to 3, lecz zajmuje mniej niz polowe zbioru (4 > 10/2) == False
	print(f"Lider zbioru A to {lider(a)}")
	# zbior B ma lidera rownego 0 - wystepuje on 4 razy (4 > 7/2) == True
	print(f"Lider zbioru B to {lider(b)}")
	# zbior C nie ma lidera; 2 wystepuje 4 razy (4 > 8/2) == False
	print(f"Lider zbioru C to {lider(c)}")
