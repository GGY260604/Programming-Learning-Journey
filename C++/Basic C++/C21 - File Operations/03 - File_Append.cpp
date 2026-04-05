#include <iostream>
#include <fstream>
using namespace std;

int main() {
    // Open the file in append mode (ios::app)
    // This ensures new data is added to the end, not overwriting
    ofstream fout("data.txt", ios::app);

    if (!fout) {
        cerr << "Error opening file for appending" << endl;
        return 1;
    }

    // Add a new line to the file
    fout << "Added new line: " << __DATE__ << " " << __TIME__ << endl;

    fout.close();
    cout << "Data appended successfully" << endl;

    return 0;
}

/*
Important Notes:
- ios::app => Append mode means all write operations go to the end of file
- Common open mode combinations:
    ios::out | ios::app  => write and append
    ios::in  | ios::app  => read and append
- __DATE__ and __TIME__ are predefined macros that insert compile time
*/
