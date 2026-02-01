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
- and how to mitigate them properly

This repository documents my learning process as I build a strong foundation
in web security and secure development practices.
