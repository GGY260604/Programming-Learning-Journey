#include <iostream>
#include <fstream>
using namespace std;

// Define a simple struct for demonstration
struct Record {
    int id;
    double score;
};

int main() {
    Record rec = {1, 95.75};

    // Write struct data into a binary file
    ofstream fout("record.bin", ios::binary);
    if (!fout) {
        cerr << "Error opening file for binary write" << endl;
        return 1;
    }

    // reinterpret_cast converts pointer type for binary writing
    fout.write(reinterpret_cast<char*>(&rec), sizeof(rec));
    fout.close();

    cout << "Record written in binary format" << endl;

    // Now read the same data back
    Record readRec;
    ifstream fin("record.bin", ios::binary);
    if (!fin) {
        cerr << "Error opening file for binary read" << endl;
        return 1;
    }

    fin.read(reinterpret_cast<char*>(&readRec), sizeof(readRec));
    fin.close();

    cout << "Read Data -> ID: " << readRec.id << ", Score: " << readRec.score << endl;

    return 0;
}

/*
Important Notes:
- ios::binary opens file in binary mode (no text formatting like newline conversion)
- Use write() and read() to handle raw bytes
- reinterpret_cast<char*> is required to treat struct as a byte array
- Always use same struct definition when reading or writing binary files
*/
