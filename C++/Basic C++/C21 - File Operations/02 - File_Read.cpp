#include <iostream>
#include <fstream>
#include <string>
using namespace std;

int main() {
    ifstream fin("data.txt");  // Open file for reading

    // Check if file exists and opened correctly
    if (!fin) {
        cerr << "Error opening file for reading" << endl;
        return 1;
    }

    string line;

    // Read each line from the file using getline()
    while (getline(fin, line)) {
        cout << line << endl;
    }

    fin.close();  // Close the file after reading
    return 0;
}

/*
Important Notes:
- ifstream = Input File Stream used for reading from files
- getline(fin, line) reads the file line by line until newline character '\n'
- When end of file (EOF) is reached, getline() returns false => loop ends
- Always close() the file when finished to free system resources
*/
