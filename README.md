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
The backend has been split into a part that exposes some REST API and returns a JSON result, after getting the data requested by the caller from the database, and a part that interfaces with the user, manages the sessions and calls the APIs to get the data to show.

The APIs are therefore exclusively for internal use and there is no authentication for their use, and allows us to further separate the functionalities and make more people work at the same time, without worrying about internal details for the callers.

## Frontend preview
![Dashboard](/images/dashboard.png?raw=true)

# Challenges
## No frameworks
The use of any kind of framework was forbidden by the organizers, so pretty much everything was made from scratch.
The only exception was being able to use Bootstrap in the interface to not make an interface coming from the 90's.

What a stupid thing to reinvent the wheel, but this is today's school... :/

## Time management
The time that was given to us for the phases before the actual realization were added 3 times higher than the latter, so the deadlines were not balanced enough and we found ourselves finishing the application the day before delivery.

## Unproductive team
Some people who were on the team had near-zero productivity, when you asked them to do a part of the code and you could no longer contact them for days, even when you personally agreed on the dates to meet. Also, before the presentation in front of the others, they didn't see the work even for a minute and were reading everything.

Two weeks were wasted just because I had to have an initial online discussion with a team member and decide on the structure to adopt for the project, but every day he was magically busy, promising at the last minute that the meeting would take place the next day.
As you can imagine, in the end it was my fault because I had to start on my own first and, only when I finished the APIs, he would start working.

Some people would have to be fired in a real company but this was not feasible in a school team work and the group leader didn't demonstrate enough ability to handle these people, so I did most of the work (On my own I created something like 1000 LOCs in 5 days).

# Straightforward code
## API Request Handler
```php
/**
 * Process an HTTP request and print the JSON result.
 */
public function processRequest(): void {
    if (
        \method_exists($this, $this->function) and
        (new \ReflectionMethod($this, $this->function))->isProtected()
    ) {
        try {
            // Variable function
            $apiFunction = $this->function;
            $result = $this->$apiFunction();
            if ($result == null) {
                showResult();
            } else {
                showResult($result);
            }
        } catch (\Exception $e) {
            // BAD_REQUEST is default HTTP error
            $code = $e->getCode();
            showError($e->getMessage(), ($code != 0) ? $code : HTTP_BAD_REQUEST);
        }
    } else {
        showError("Invalid endpoint", HTTP_BAD_REQUEST);
    }
}
```

This is the code that matches an incoming request at a certain API endpoint to a method of the same class that handles it.
This method can either return a result, which is shown to the user, or throw an exception, and in this case a description of the error and a status code other than 200 is shown to the user.

To make the match we have verified that there is a method with the name specified by the user calling the API and we have imposed that it must be protected (a sort of marker to indicate which methods the user can call and prevent any attacks).
I find this simple solution to be brilliant considering the impossibility of using a framework, and the alternative would have been an associative array that has a function as a value, but there would have been much more redundant code.

## Dashboard Chart
```sql
SELECT
CASE
    WHEN NCR.nonComplianceCode IS NOT NULL THEN "closed"
    WHEN NCC.nonComplianceCode IS NOT NULL THEN "review"
    WHEN NCA.nonComplianceCode IS NOT NULL THEN "progress"
    ELSE "new"
END AS status, COUNT(*) AS counter
FROM NonCompliance NC
LEFT JOIN NonComplianceAnalysis AS NCA ON NC.code = NCA.nonComplianceCode
LEFT JOIN NonComplianceCheck AS NCC ON NC.code = NCC.nonComplianceCode
LEFT JOIN NonComplianceResult AS NCR ON NC.code = NCR.nonComplianceCode
GROUP BY status;

SELECT date,
CASE
    WHEN NCR.nonComplianceCode IS NOT NULL THEN "closed"
    WHEN NCC.nonComplianceCode IS NOT NULL THEN "review"
    WHEN NCA.nonComplianceCode IS NOT NULL THEN "progress"
    ELSE "new"
END AS status, COUNT(*) AS counter
FROM NonCompliance NC
LEFT JOIN NonComplianceAnalysis AS NCA ON NC.code = NCA.nonComplianceCode
LEFT JOIN NonComplianceCheck AS NCC ON NC.code = NCC.nonComplianceCode
LEFT JOIN NonComplianceResult AS NCR ON NC.code = NCR.nonComplianceCode
WHERE date > (CURDATE() - INTERVAL 30 DAY) AND date <= CURDATE()
GROUP BY date, status
ORDER BY date DESC;
```

These two queries allow us to obtain the necessary statistics for the graphs, and are performed in a single transaction to use consistent data as a starting point.

The first query allows you to obtain the number of total transactions divided by type, using a GROUP BY for a status field that we calculate in the query, checking if there are records in certain tables.

The second query does a similar thing, but only for the last 30 days, also grouping the data for each day, and then returning the statistics by day and type for the last month.
