#include <iostream>
using namespace std;

class Student {
private:
    string name;
    int age;

public:
    Student(string name, int age) {
        // "this" pointer refers to the object that called the constructor
        this->name = name;
        this->age = age;
    }

    void show() {
        cout << "Name: " << name << ", Age: " << age << endl;
    }
};

int main() {
    Student s("Galen", 21);
    s.show();

    return 0;
}

/*
Important Notes:
- "this" is a pointer that points to the calling object
- Useful when parameter names are the same as class data members
- Commonly used in constructors and setters
*/
