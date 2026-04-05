#include <iostream>
using namespace std;

class Base {
public:
    int pub = 1;
protected:
    int prot = 2;
private:
    int priv = 3;
};

class DerivedPublic : public Base {
public:
    void show() {
        cout << "Public: " << pub << endl;    // Accessible
        cout << "Protected: " << prot << endl; // Accessible
        // cout << "Private: " << priv << endl; // Not accessible, compile error
    }
};

class DerivedProtected : protected Base {
public:
    void show() {
        cout << "Public (becomes protected): " << pub << endl;
        cout << "Protected: " << prot << endl;
    }
};

class DerivedPrivate : private Base {
public:
    void show() {
        cout << "Public (becomes private): " << pub << endl;
        cout << "Protected (becomes private): " << prot << endl;
    }
};

int main() {
    DerivedPublic dpub;
    dpub.show();
    cout << "Access public from object: " << dpub.pub << endl; // OK

    // DerivedProtected dprot; // Cannot access public members outside class
    // DerivedPrivate dpriv;   // Cannot access public members outside class

    return 0;
}

/*
Important Notes:
- Inheritance access types affect visibility in derived class:
    public: base public -> derived public, protected -> protected
    protected: base public -> derived protected, protected -> protected
    private: base public/protected -> derived private
- Private members of base class remain inaccessible in derived class
- Use getters/setters to maintain encapsulation in derived classes
*/
