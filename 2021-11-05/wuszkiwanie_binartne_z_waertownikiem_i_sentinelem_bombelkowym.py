a = [1, 5, 7, 12, 16, 21, 43, 96]

x = int(input("Podaj liczbe ktora chcesz znalezc posrod zbioru elementow posortowanej tablicy o nazwie a zawirajacej w sumie 8 elementow: "))

n = len(a)
p = 0
k = n - 1

while p <= k:
	s = (p + k) // 2
	if a[s] == x:
		print(f"Element {x} znajduje sie pod indeksem {s}")
		exit()
	if a[s] < x:
		p = s + 1
	else:
		k = s - 1

print(f"Nie znaleziono elementu {x}")
