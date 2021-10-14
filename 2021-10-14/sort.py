a = [3, 4, 16, 8, 3, 1]
b = [7, 6, 2, 3, 1, 1, 1, 1]
c = [8, 9, 6, 1, 7, 2, 9, 1]

# funkcja pomocnicza do zamiany elementów miejscami
def swap(items: list, a: int, b: int):
    c = items[a]
    items[a] = items[b]
    items[b] = c


def quick_sort(items: list, l: int = None, p: int = None) -> list:
    if l is None:
        l = 0  # indeks pierwszego elementu (pod)zbioru
    if p is None:
        p = len(items) - 1  # indeks ostatniego elementu (pod)zbioru

    i = int((l + p) / 2)  # początkowo indeks środkowego elementu (pivot)

    pivot = items[i]
    swap(items, i, p)  # zamiana pivotu i ostatniego elementu (pod)zbioru
    i = l  # zmienne pomocnicze i, j ustawione na początek (pod)zbioru
    j = l

    # przeszukiwanie całego (pod)zbioru
    while i < p:
        # sprawdzany element mniejszy od pivotu, przesunięcie go na lewą stronę pivotu
        if items[i] < pivot:
            # umieszczenie elementu mniejszego na pozycji po lewej stronie
            swap(items, i, j)
            # następne elementy zostaną umieszczone na miejscu następnym
            j += 1
        i += 1

    items[p] = items[j]
    items[j] = pivot

    # sortowanie lewej części (pod)zbioru
    if l < j - 1:
        quick_sort(items, l, j - 1)
    # sortowanie prawej częsci (pod)zbioru
    if j + 1 < p:
        quick_sort(items, j + 1, p)
    return items


def merge(result: list, left: list, right: list):
    l = 0  # indeks w lewej części
    r = 0  # indeks w prawej części
    i = 0  # indeks w zbiorze wyjściowym

    while i < len(result):
        # sprawdzenie czy indeksy są zawarte w zbiorze
        a = l >= len(left)
        b = r >= len(right)
        # porównanie wartości obu części (tylko jeśli indeksy są w zbiorze)
        c = left[l] < right[r] if not a and not b else False
        # umieszczenie nie-mniejszego elementu z prawej części w zbiorze wyjściowym
        if a or (not b and not c):
            result[i] = right[r]
            r += 1
            i += 1
        # umieszczenie mniejszego elementu z lewej części w zbiorze wyjściowym
        elif b or c:
            result[i] = left[l]
            l += 1
            i += 1


def merge_sort(items: list) -> list:
    n = len(items)  # ilość elementów w zbiorze

    if n <= 1:
        return items
    m = int(n / 2)  # indeks środkowego elementu

    # podzielenie zbioru na dwie części
    left = items[0:m]
    right = items[m:n]

    # wykonanie merge_sort na obu częściach
    left = merge_sort(left)
    right = merge_sort(right)
    # połączenie obu części w posortowany zbiór
    merge(items, left, right)
    # wartość zwrotna
    return items


def selection_sort(items: list) -> list:
    n = len(items)  # ilość elementów w zbiorze
    i = 0  # początkowy indeks

    # iteracja po wszystkich elementach
    while i < n:
        indeks = i  # indeks najmniejszego elementu, domyślnie pierwszy
        j = i + 1  # indeks drugiego elementu - początek porównywania
        # znajdywanie najmniejszego elementu
        while j < n:
            # element mniejszy od aktualnie najmniejszego
            if items[j] < items[indeks]:
                # ustaw indeks na indeks aktualnie najmniejszego elementu
                indeks = j
            # przejście do następnego elementu
            j += 1
        # umieść najmniejszy element na początku zbioru
        swap(items, i, indeks)
        # przejście do następnego elementu
        i += 1
    return items


def insertion_sort(items: list) -> list:
    n = len(items)
    i = 1  # początkowy indeks - drugi element zbioru

    # iteracja po wszystkich elementach
    while i < n:
        klucz = items[i]  # element porównywany
        j = i - 1  # wskaźnik pomocniczy w iteracji

        # element większy od klucza...
        while j >= 0 and items[j] > klucz:
            # ... zostaje przeniesiony jedną pozycję w lewo
            # dopóki nie znajdzie się na początku zbioru
            items[j + 1] = items[j]
            j -= 1
        # klucz zostaje przypisany na prawo od elementu przenoszonego
        items[j + 1] = klucz
        # przejście do następnego elementu
        i += 1
    return items


if __name__ == "__main__":
    # list(a) używane jest, aby pierwotne listy pozostały niezmienione (dla następnych algorytmów)
    print(f"Sortowanie szybkie, zbiór A: {quick_sort(list(a))}")
    print(f"Sortowanie szybkie, zbiór B: {quick_sort(list(b))}")
    print(f"Sortowanie szybkie, zbiór C: {quick_sort(list(c))}")
    print(f"Sortowanie przez scalanie, zbiór A: {merge_sort(list(a))}")
    print(f"Sortowanie przez scalanie, zbiór B: {merge_sort(list(b))}")
    print(f"Sortowanie przez scalanie, zbiór C: {merge_sort(list(c))}")
    print(f"Sortowanie przez wybieranie, zbiór A: {selection_sort(list(a))}")
    print(f"Sortowanie przez wybieranie, zbiór B: {selection_sort(list(b))}")
    print(f"Sortowanie przez wybieranie, zbiór C: {selection_sort(list(c))}")
    print(f"Sortowanie przez wstawianie, zbiór A: {insertion_sort(list(a))}")
    print(f"Sortowanie przez wstawianie, zbiór B: {insertion_sort(list(b))}")
    print(f"Sortowanie przez wstawianie, zbiór C: {insertion_sort(list(c))}")
