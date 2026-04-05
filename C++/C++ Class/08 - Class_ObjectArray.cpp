#include <iostream>
using namespace std;

class Student {
public:
    string name;
    int score;

    void input() {
        cout << "Enter name and score: ";
        cin >> name >> score;
    }

    void display() {
        cout << name << " scored " << score << endl;
    }
};

int main() {
    Student students[3];

    // Input data for multiple objects
    for (int i = 0; i < 3; i++) {
        cout << "Student " << i + 1 << ":" << endl;
        students[i].input();
    }

    // Display all
    cout << "\nResult list:" << endl;
    for (int i = 0; i < 3; i++) {
        students[i].display();
    }

    return 0;
}

/*
Important Notes:
- You can create an array of objects
- Access object members using dot operator and array index
- Useful for handling multiple data items of same class
*/
