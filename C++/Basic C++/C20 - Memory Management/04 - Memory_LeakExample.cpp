// Topic: Memory Leak Example
// A memory leak happens when you allocate memory but never free it
// The memory stays reserved until program ends

#include <iostream>
using namespace std;

void createLeak() {
    int* leak = new int[1000]; // allocated but never deleted
    // memory leak happens here because delete[] is missing
}

int main() {
    for (int i = 0; i < 100; i++)
        createLeak(); // leak happens 100 times
    cout << "Memory leak example completed (not recommended)." << endl;
    return 0;
}
