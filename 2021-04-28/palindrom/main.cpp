#include <iostream>
#include <cstring>

using namespace std;

int main()
{
    string str1;
    string str2;
    cout<<"Podaj slowo: ";
    cin>>str1;
    str2 = str1;

    int n = str2.length();
    for (int i = 0; i < n / 2; i++)
        swap(str2[i], str2[n - i - 1]);

    if (strcmp(str1.c_str(), str2.c_str()) == 0) {
        cout<<"Slowo to palindrom."<<endl;
    }
    else {
        cout<<"Slowo to nie palindrom."<<endl;
    }
    return 0;
}
