a = [12, 24, 5, 16, 20, 12, 8, 10]

x = int(input("Podaj liczbe: "))


def ls(a, x):
	n = len(a)
	i = 0
	while i < n:
		if a[i] == x:
			print(f"Element {x} znajduje sie pod indeksem {i}")
			return
		i += 1

	print(f"Nie znaleziono elementu {x}")

def lsw(a, x):
	n = len(a)
	a.append(x)
	i = 0
	while a[i] != x:
		i += 1
	if i == n:
		print(f"Nie znaleziono elementu {x}")
		return
	print(f"Element {x} znajduje sie pod indeksem {i}")



ls(a, x)
lsw(a, x)
