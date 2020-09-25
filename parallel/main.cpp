#include <iostream>

int main() {
	printf("y = kx + b1\n");
	printf("y = mx + b2\n\n");
	float k, m, b1, b2;
	printf("Enter k value: ");
	scanf("%f", &k);
	printf("Enter m value: ");
	scanf("%f", &m);
	
	printf("Enter b1 value: ");
	scanf("%f", &b1);
	printf("Enter b2 value: ");
	scanf("%f", &b2);

	if (k == m) {
		printf("Lines are parallel\n");
	}
	else if (k == -1/m) {
		printf("Lines are perpendicular\n");
	}
	else {
		printf("Lines are neither paraller nor perpendicular\n");
	}
	return 0;
}
