#include <iostream>
#include <cmath>

// This program allows the user to input two lengths.
// This will result in calculating the area and
// perimiter of a right-angle triangle defined by those
// two side lengths.
//
// author kuba2k2 2020-09-11

int main() {
	float a, b;
	printf("Enter the side A length: ");
	scanf("%f", &a);
	printf("Enter the side B length: ");
	scanf("%f", &b);
	float area = a*b/2;
	float c = sqrt(a*a + b*b);
	float perimeter = a+b+c;

	printf("The area is %.2f.\nThe perimeter is %.2f.", area, perimeter);
	return 0;
}
