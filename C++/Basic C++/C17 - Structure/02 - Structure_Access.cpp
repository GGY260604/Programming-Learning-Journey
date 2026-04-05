#include <iostream>
using namespace std;

struct Car {
    string brand;
    string model;
    int year;
};

int main() {
    Car car1 = {"Toyota", "Corolla", 2020};
    Car car2;

    // Assigning values later
    car2.brand = "Honda";
    car2.model = "Civic";
    car2.year = 2022;

    cout << "Car 1: " << car1.brand << " " << car1.model << " (" << car1.year << ")" << endl;
    cout << "Car 2: " << car2.brand << " " << car2.model << " (" << car2.year << ")" << endl;

    // Update member
    car1.year = 2023;
    cout << "Car 1 (updated year): " << car1.year << endl;

    // You can copy structures directly
    car2 = car1;
    cout << "Car 2 (after copying Car 1): " << car2.brand << " " << car2.year << endl;
}
