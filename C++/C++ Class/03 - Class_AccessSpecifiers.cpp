#include <iostream>
using namespace std;

class Base {
public:
    int a;
protected:
    int b;
private:
    int c;

public:
    void setValues() {
        a = 1;
        b = 2;
        c = 3;
    }

    void show() {
        cout << "a: " << a << ", b: " << b << ", c: " << c << endl;
    }
};

int main() {
    Base obj;
    obj.setValues();
    obj.show();

    // Accessible: public
    cout << obj.a << endl;

    // Not accessible:
    // cout << obj.b << endl;  // Error
    // cout << obj.c << endl;  // Error

    return 0;
}

/*
Important Notes:
- public: accessible from anywhere
- private: accessible only within the class
- protected: accessible inside class and subclasses
- Default access in a class is private
*/
