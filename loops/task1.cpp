#include <iostream>

int main() {
	int a, b;
	printf("Range start (inclusive): ");
	scanf("%d", &a);
	printf("Range end (inclusive): ");
	scanf("%d", &b);
	if (a > b) {
		printf("Range start must be smaller than range end.\n");
		return 1;
	}
	printf("Odd numbers in range <%d; %d>\n", a, b);
	// find nearest larger odd number
	a += (a % 2) ? 0 : 1;
	while (a <= b) {
		printf("%d%s", a, b - a <= 1 ? "" : ", ");
		a += 2;
	}
	printf("\n");
	return 0;
}

