# Web Security Lab

Hands-on learning project to practice and understand common web vulnerabilities
in a controlled local environment.

This repository contains intentionally vulnerable code created **for educational purposes only**.

---

## Environment

- Ubuntu Server VM
- Apache + PHP + MySQL
- Access via SSH and VS Code
- Purpose: learn and practice web vulnerabilities in a safe, local setup

---

## Vulnerabilities Covered

### Reflected XSS
- **Where:** `xss.php`
- **Cause:** User input printed directly with `echo`
- **Exploit:** `<script>alert(1)</script>`
- **Impact:** JavaScript execution in the victim’s browser
- **Fix:** `htmlspecialchars()` on output

---

### SQL Injection (Login)
- **Where:** `login.php`
- **Cause:** SQL query built using string concatenation
- **Exploit:** `admin' --`
- **Impact:** Authentication bypass
- **Fix:** Prepared statements with bound parameters

---

### DOM-based XSS
- **Where:** `search.html`
- **Cause:** Use of `innerHTML` with user-controlled input
- **Exploit:** `<img src=x onerror=alert(1)>`
- **Impact:** Client-side JavaScript execution
- **Fix:** `textContent` and safe DOM manipulation (`createElement()`)

---

### API Usage
- **Endpoint:** `/api/search_user.php`
- **Purpose:** Return user data as JSON
- **Security:** Prepared statements used to prevent SQL injection

---

### Stored XSS (Comments)
- **Feature:** `comments.php`
- **Vulnerabilities:**
  - SQL Injection in `INSERT` queries (string concatenation)
  - Stored XSS on output
- **Exploit:** `<img src=x onerror=alert(1)>`
- **Impact:** Persistent JavaScript execution for all users
- **Fixes:**
  - Prepared statements for database insertion
  - `htmlspecialchars()` on output

---

## Goal

The goal of this project is to understand:
- why web vulnerabilities occur
- their real-world impact
- how to mitigate them properly

This repository documents my learning process as I build a strong foundation
in web security and secure development practices.

--- 

## Disclaimer

This project is for educational purposes only.
All vulnerabilities are demonstrated in a local and controlled environment.
Do not use these techniques on systems you do not own or have explicit permission to test.

--- 

## Next Steps

This project will continue to evolve as I progress through further
web security and penetration testing topics.

Planned next steps include:

- Implementing and analyzing **authorization flaws** such as
  Insecure Direct Object References (IDOR)
- Exploring **authentication weaknesses** and session handling issues
- Adding basic **access control logic** and testing for bypasses
- Practicing additional **OWASP Top 10** vulnerabilities in this lab
- Improving documentation by linking vulnerabilities to
  penetration testing methodologies and real-world attack scenarios

The goal is to progressively expand this lab into a more complete
web application security testing environment, aligned with my ongoing
learning in Hack The Box Academy and penetration testing fundamentals.

