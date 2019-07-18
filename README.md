# Complete PHP Search Script

## Essential components of the search script

- Prevents sql injection
- Data sanitization with built in functions like [trim](https://www.w3schools.com/php7/func_string_trim.asp "Visit w3schools to learn more"), [FILTER_SANITIZE_STRING](https://www.w3schools.com/php7/filter_sanitize_string.asp "Removes unecessay tags and characters from search term"), & [FILTER_SANITIZE_MAGIC_QUOTES](https://www.w3schools.com/php7/filter_sanitize_magic_quotes.asp "Removes quotes, adds backslashes to escape harmful input")
- Promt for empty search
- Propmt for seach characters less than 3
- Returns matching search **_count_**
- No search found page displays tips for acccurate search

### GUIDELINES FOR TESTING SEARCH FORM

---

- Export database file named **phpsearch.sql** into your created database
- change database name in _dbconnect.php_ to match your database name.

- _That is all you need!, you're good to go_
