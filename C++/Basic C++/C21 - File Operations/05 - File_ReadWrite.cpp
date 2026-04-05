#include <iostream>
#include <fstream>
#include <string>
using namespace std;

int main() {
    // Create a file and write initial content
    fstream file("notes.txt", ios::out);  // open for writing
    if (!file) {
        cerr << "Error creating file" << endl;
        return 1;
    }

    file << "Line 1: Welcome to C++ file handling" << endl;
    file << "Line 2: This is the original content" << endl;
    file.close();

    // Now reopen the same file for both reading and writing
    // ios::in | ios::out means read and write mode
    fstream rwFile("notes.txt", ios::in | ios::out);
    if (!rwFile) {
        cerr << "Error opening file for read and write" << endl;
        return 1;
    }

    // Read all existing lines first
    cout << "Current File Content:" << endl;
    string line;
    while (getline(rwFile, line)) {
        cout << line << endl;
    }

    // After reading, we must clear the EOF flag before writing again
    rwFile.clear();

    // Move the writing pointer to the end of file to append text
    rwFile.seekp(0, ios::end);
    rwFile << "Line 3: This line was added later" << endl;

    rwFile.close();
    cout << "File updated successfully" << endl;

    return 0;
}

/*
Important Notes:
- fstream can perform both reading and writing
- Opening mode ios::in | ios::out allows both operations
- After reading to the end, clear() is needed to reset the EOF flag
- seekp(offset, position) changes the writing pointer location
  Common positions:
    ios::beg => beginning of file
    ios::cur => current position
    ios::end => end of file
- Always close the file after done
*/
