with open("przyklad.txt", "r") as f:
    text = f.read()

img = [[int(n) for n in l.split(" ") if n] for l in text.split("\n") if l]

def zad1():
    nmax = max([max(row) for row in img])
    nmin = min([min(row) for row in img])
    print(f"Zad. 6.1.: max = {nmax}, min = {nmin}")

def zad2():
    count = len([1 for row in img if row != list(reversed(row))])
    print(f"Zad. 6.2.: liczba = {count}")

def zad3():
    count = 0
    for y, row in enumerate(img):
        for x, pixel in enumerate(row):
            if y > 0:
                topdiff = img[y - 1][x] - pixel
                if abs(topdiff) > 128:
                    count += 1
                    continue
            if x > 0:
                leftdiff = row[x - 1] - pixel
                if abs(leftdiff) > 128:
                    count += 1
                    continue
            if y < len(img) - 1:
                bottomdiff = img[y + 1][x] - pixel
                if abs(bottomdiff) > 128:
                    count += 1
                    continue
            if x < len(row) - 1:
                rightdiff = row[x + 1] - pixel
                if abs(rightdiff) > 128:
                    count += 1
                    continue
    print(f"Zad. 6.3.: liczba = {count}")

def zad4():
    prow = []
    counts = []
    max_counts = []
    for row in img:
        if not prow:
            prow = row
            counts = [1] * len(row)
            max_counts = [1] * len(row)
            continue
        for x, pixel in enumerate(row):
            if prow[x] != pixel:
                counts[x] = 1
                continue
            # prow[x] == pixel
            counts[x] += 1
            max_counts[x] = max(max_counts[x], counts[x])
        prow = row
    max_count = max(max_counts)
    print(f"Zad. 6.4.: liczba = {max_count}")

if __name__ == "__main__":
    zad1()
    zad2()
    zad3()
    zad4()
