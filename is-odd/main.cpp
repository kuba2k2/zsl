#include <iostream>

// The program allows the user to enter a number.
// The number is then checked to be smaller than 100,
// and an information whether the number is even or odd
// is printed on the screen.
//
// author: kuba2k2 2020 © copyright 2020-09-11 all rights reserved do not copy redistribute and modify

int main() {
	int number = 0;
	printf("Enter a number [< 100]: ");
	scanf("%d", &number);
	if (number >= 100) {
		printf("!!! The number has to be less than 100.\n");
		return 1;
	}
	if (number % 2 == 0)
		printf("The number %d is even.\n", number);
	else
		printf("The number %d is odd.\n", number);
	return 0;
}
