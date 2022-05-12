![Logo](/../design/logo/full_nobg_white.png?raw=true)

# Introduction
IpDigital is a project assigned by the professors of the high school [ITI F. Severi](https://www.itiseveripadova.edu.it/) to the students of my class, divided into 6-7 people teams, with the aim of designing and creating a web application that meets certain pre-established requirements.
The work takes place within the PCTO 2021/2022 project, which aims to introduce people to the world of work.

# Teammates
- [Azemi Kevin](https://github.com/Klay4)
- Cadore Alessio
- Candian Michele
- [El Ikhbari Ilias](https://github.com/BlackJekko)
- Falasco Giosuè
- Rubin Francesca

# Goal
The goal was to create a system for the management of non-compliances in our imaginary company, thus allowing you to keep track of how the problems have been solved in past and solve those in the present through a simple but effective web interface, leaving the employee enough freedom of choice on how to go to act on a problem that presented himself.

# Timeline
## [First day](https://github.com/PCTO-2122/dashboard-design)
First of all, we dealt with thinking about a business identity that represents a company that could exist, and we decided to assign the name "Ipdigital".
This fake company deals with producing and selling USB sticks addressed to the business world and produced in recycled and ecological materials, in order to reduce the environmental impact.

## Project management
We defined a project development plan using the knowledge learned from the project management subject faced at school, thus making a complete analysis of times and risks, through the [Work Breakdwon Structure](https://github.com/PCTO-2122/dashboard-docs/blob/main/management/WBS/Diagram.png), the [Critical Path Method](https://github.com/PCTO-2122/dashboard-docs/blob/main/management/CPM/Diagram.png) and the [Gantt diagram](https://github.com/PCTO-2122/dashboard-docs/blob/main/management/GANTT/Diagram.png).
We also defined the various [business processes](https://github.com/PCTO-2122/dashboard-docs/blob/main/management/project_management.pdf) that are used to produce and sell USB sticks, through the view of some videos on YouTube and blogs that dealt with this topic specifically.

## [Definition](https://github.com/PCTO-2122/dashboard-docs/blob/main/architecture/architectural_document.pdf)
We designed the interface of the web application and defined the various features through the requirements that were requested, also trying to ask for more information on what the customer (the professor) wanted and possibly reaching compromises on certain things that are hardly achievable in the established times.

## Execution
We made the [database](https://github.com/PCTO-2122/dashboard-docs/tree/main/database) starting from the design of an E-R scheme, and reaching its translation into SQL queries to be performed in the DBMS MySQL, thus ensuring their compatibility with the system.
A web application in [PHP](https://github.com/PCTO-2122/dashboard-api) and [Bootstrap](https://github.com/PCTO-2122/dashboard) was also created to allow the user to interact with data and modify them easily, as required by the project goals.

# Technology stack
![Architecture](/images/architecture.png?raw=true)
- Frontend
  - Bootstrap template
- Backend
  - PHP
  - MySQL
  - NGINX
- Hosting
  - DigitalOcean VPS
  - Freenom domain + Let's Encrypt certificate
  - Cloudflare CDN

## API
The backend has been split into a part that exposes some REST API and returns a JSON result, after getting the data requested by the caller from the database, and a part that interfaces with the user, manages the sessions and calls the APIs to get the data to show .
The APIs are therefore exclusively for internal use and there is no authentication for their use, and allows us to further separate the functionalities and make more people work at the same time, without worrying about internal details for the callers.

## Frontend preview
![Dashboard](/images/dashboard.png?raw=true)

# Challenges
