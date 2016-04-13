# sifImporter

PHP client for importing patron information from registry to Voyager. 

## Installation

```
```

## Usage

Usage example can be found from the tests/ directory.

Basic currently takes a preformated CSV file from command-line and outputs patron records in SIF-format

```
./sifImporter -i patron_input.csv -o patron_output.sif -l patron_logfile.log
```
Only input file is required. Note that at the moment there is no validation of csv file. It needs to contain the required fields and nothing else.


## Contributions

## License and copyright

This project is licensed under the terms of **GNU General Public License Version 3**.
