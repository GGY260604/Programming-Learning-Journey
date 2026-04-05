#include <iostream>
using namespace std;

struct Book {
    string title;
    string author;
    int year;
};

int main() {
    // Create an array of structures
    Book library[3] = {
        {"C++ Basics", "Bjarne Stroustrup", 2013},
        {"Learn C++", "John Doe", 2017},
        {"Mastering C++", "Jane Smith", 2021}
    };

    cout << "Library Collection:" << endl;

    // Loop through structure array
    for (int i = 0; i < 3; i++) {
        cout << i + 1 << ". " << library[i].title
             << " by " << library[i].author
             << " (" << library[i].year << ")" << endl;
    }

    // Note:
    // - Each element of the array is a structure variable
    // - Access members using dot operator (library[i].title)
}
