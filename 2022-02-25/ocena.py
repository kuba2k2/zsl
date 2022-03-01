with open("ocena.txt", encoding="utf-8") as f:
	data = f.read().split("\n")[1:]

oceny = []

for line in data:
	line = line.split(";")
	oceny.append({
		"kod": line[0],
		"imie": line[1],
		"ocena": int(line[2]),
		"waga": int(line[3]),
	})

print("Zadanie 1:")
cnt = 0
for ocena in oceny:
	if ocena["ocena"] in [4, 6]:
		cnt+=1
print(f"{cnt} ocen")
print()

print("Zadanie 2:")
srednie = {}
for ocena in oceny:
	if ocena["kod"] not in srednie:
		srednie[ocena["kod"]] = {
			"suma": 0,
			"suma_arytm": 0,
			"waga": 0,
			"waga_arytm": 0,
			"srednia": 0,
		}
	srednie[ocena["kod"]]["suma"] += ocena["ocena"] * ocena["waga"]
	srednie[ocena["kod"]]["waga"] += ocena["waga"]
	srednie[ocena["kod"]]["suma_arytm"] += ocena["ocena"]
	srednie[ocena["kod"]]["waga_arytm"] += 1
	srednie[ocena["kod"]]["srednia"] = srednie[ocena["kod"]]["suma"] / srednie[ocena["kod"]]["waga"]
	srednie[ocena["kod"]]["srednia_arytm"] = srednie[ocena["kod"]]["suma_arytm"] / srednie[ocena["kod"]]["waga_arytm"]
	srednie[ocena["kod"]]["sem"] = 1 if srednie[ocena["kod"]]['srednia'] < 1.8 else round(srednie[ocena["kod"]]['srednia'])
	srednie[ocena["kod"]]["sem_arytm"] = 1 if srednie[ocena["kod"]]['srednia_arytm'] < 1.8 else round(srednie[ocena["kod"]]['srednia_arytm'])
	srednie[ocena["kod"]]["kobieta"] = ocena["imie"].split(" ")[0].endswith("a")
	srednie[ocena["kod"]]["klasa"] = ocena["kod"][0]
	srednie[ocena["kod"]]["imie"] = ocena["imie"]

srednie2 = sorted(srednie.items(), key=lambda s: s[1]["srednia"])[:10]
for kod, sr in srednie2:
	print(f" - {kod}: %.2f" % sr['srednia'])
print()

print("Zadanie 3:")
srednie3 = sorted(srednie.items(), key=lambda s: s[0])
srednie3 = list([s for s in srednie3 if s[0][0:2] == "D2" and len(s[0]) == 3])
for kod, sr in srednie3:
	print(f" - {kod}: ocena na semestr: {sr['sem']}, średnia ważona: %.2f" % sr['srednia'])
print()

print("Zadanie 4:")
kody = ['A', 'B', 'C', 'D']
for kod in kody:
	kobiety = [s["srednia"] for k, s in srednie.items() if s["kobieta"] and s["klasa"] == kod]
	mezczyzni = [s["srednia"] for k, s in srednie.items() if not s["kobieta"] and s["klasa"] == kod]
	print(f" - Klasa {kod}, kobiety: %.2f" % (sum(kobiety) / len(kobiety)))
	print(f" - Klasa {kod}, mężczyźni: %.2f" % (sum(mezczyzni) / len(mezczyzni)))
print()

print("Zadanie 5:")
srednie4 = sorted(srednie.items(), key=lambda s: s[0])
srednie4 = list([s for s in srednie4 if s[0][0] == "D"])
nie_maja = 0
for kod, sr in srednie4:
	waga = sr["waga"] + 4
	i = 1
	while True:
		suma = sr["suma"] + i * 4
		nowa_sr = suma/waga
		nowa_sem = 1 if nowa_sr < 1.8 else round(nowa_sr)
		if nowa_sem > sr["sem"]:
			if i > 6:
				nie_maja+=1
				break
			print(f" - Uczeń {sr['imie']} musi uzyskać co najmniej ocenę {i}")
			break
		i+=1
print(f"Uczniowie niemający możliwości poprawienia oceny: {nie_maja}")
print()

print("Zadanie 6:")
wyzsza = 0
nizsza = 0
for kod, sr in srednie.items():
	if sr["sem_arytm"] > sr["sem"]:
		wyzsza+=1
	if sr["sem_arytm"] < sr["sem"]:
		nizsza+=1
print(f"{wyzsza} uczniów uzyskałoby wyższą ocenę")
print(f"{nizsza} uczniów uzyskałoby niższą ocenę")
