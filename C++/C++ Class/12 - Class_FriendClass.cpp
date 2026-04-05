#include <iostream>
using namespace std;

class Engine;  // Forward declaration

class Car {
private:
    string brand;
    Engine* engine;  // Pointer to Engine object

public:
    Car(string b) : brand(b), engine(nullptr) {}

    void setEngine(Engine* e) {
        engine = e;
    }

    void display() {
        cout << "Car Brand: " << brand << endl;
        if (engine) // Non-null pointer => true
            cout << "Engine Horsepower: " << engine->getHorsepower() << endl;
    }

    // Declare Engine as friend class
    friend class Engine;
};

class Engine {
private:
    int horsepower;

public:
    Engine(int hp) : horsepower(hp) {}

    int getHorsepower() const {
        return horsepower;
    }

    void upgradeHorsepower(int hp) {
        horsepower = hp;
    }

    void modifyCarBrand(Car& car, const string& newBrand) {
        // Friend class can access private members
        car.brand = newBrand;
    }
};

int main() {
    Car myCar("Toyota");
    Engine myEngine(150);

    myCar.setEngine(&myEngine);

    cout << "--- Before modification ---" << endl;
    myCar.display();

    // Friend class can modify private members of Car
    myEngine.modifyCarBrand(myCar, "Honda");

    cout << "\n--- After modification ---" << endl;
    myCar.display();

    return 0;
}

/*
Important Notes:
- Friend Class:
    - All members of the friend class can access private/protected members of the host class
    - Useful for tight coupling where two classes need direct access
- Maintain encapsulation by limiting friend classes to only those that require access
- In professional practice:
    - Prefer getters/setters and only use friend functions/classes when necessary
*/
