## house-tenant application

Based on Symfony 5.0

### Description

There is a residential building.
There are apartments in the house:
```
1st floor 101 102 103 104 .. 110
2nd floor 201 202 203 204 .. 210
...
7th floor 701 702 703
...
12th floor 1201 1202 1203 .. 1210
13th floor PH01 PH02 PH03 PH04
14th floor LH01 LH02
```

The apartments have residents (people).
Each person can have 3 conditions:
- not active (not user)
- invited to the system
- active

Need to give JSON:
```json
{
   "total":10,
   "entity":[
      {
         "level":1,
         "suites":[
            {
               "suiteNumber":"101",
               "notActive":1,
               "invited":2,
               "active":0
            },
            {

            }
         ]
      }
   ]
}
```
